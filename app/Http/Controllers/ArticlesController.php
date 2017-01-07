<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Article;
use App\Image;
use  Laracasts\Flash\FlashServiceProvider;
use App\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $articles = Article::title($request->title)->orderBy('id', 'DESC')->paginate(5);
        $articles->each(function($articles){
            $articles->category;
            $articles->user;
        });

        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories =  Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags = Tag::orderBy('name', 'ASC')->pluck('name', 'id');
        return view('admin.articles.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
          

                $file = $request->file('image');
                
                $name = 'vamosaprogramar_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path().'\img\articles';
                $file->move($path, $name);
                //Redimensionar Imagen 
                $path_resize = public_path().'\img\articles\\'.$name;
                $image_resize = \Image::make($path_resize);
                $image_resize->fit(670,320);
                $image_resize->save();
              

                $article = new Article();
                $article->title = $request->title;
                $article->content = $request->content;
                $article->user_id = \Auth::user()->id; 
                $article->category_id = $request->category_id;
                $article->save();

                //Asociar los ID de los tags con el articulo
                // The sync method accepts an array of IDs to place on the intermediate table
                $article->tags()->sync($request->tags);


                $image = new Image();
                $image->name = $name; 
                //Revisar la siguiente linea de codigo...tal vez sea mejor
                //utilizar el metodo associate()
                $image->article_id = $article->id;
                $image->save();
        flash('El articulo '.$article->name.' se ha agregado!', 'success');
        return redirect()->route('articles.index');


    }

  function resize($path){
             //Redimensionar Imagen 
               /* $file_resize = public_path().'\img\articles'.$name;
                $image = \Image::make($file_resize);
                $image->fit(200, 400);
                $file_resize->move($path.'\resize', $name);
*/

                $img = \Image::make($path);
                $img->fit(200,400);
                return $img->response();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
       $article = Article::find($id);
       $categories = Category::orderBy('id', 'DESC')->pluck('name', 'id');
       $tags = Tag::orderBy('id', 'DESC')->pluck('name', 'id');
    
        $my_tags = $article->tags->pluck('id')->ToArray();
     

        return view('admin.articles.edit')
        ->with('categories', $categories)
        ->with('article', $article)
        ->with('tags', $tags)
        ->with('my_tags', $my_tags)
        ;
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $article = Article::find($id);
            $article->fill($request->all());
            $article->save();
            $article->tags()->sync($request->tags);
            flash('El articulo '.$article->title.' se ha editado con exito!');
            return redirect()->route('articles.index');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        flash('El articulo'.$article->title.' ha sido eliminado!','danger');
        return redirect()->route('articles.index');
    }
}
