<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   Carbon::setLocale('es');
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(2);

        return view('front.users.index')->with('articles', $articles);
    }

    public function searchCategory(Request $request, $name)
    {

          $category = Category::search($name)->first();
          $articles = $category->articles()->orderBy('id', 'DESC')->paginate(2);
        return view('front.users.index')->with('articles', $articles);
        
    }

    public function searchTag(Request $request, $name)
    {
        $tag = Tag::search($name)->first();
        $articles  = $tag->articles()->orderBy('id', 'DESC')->paginate(2);
        return view('front.users.index')->with('articles', $articles);
    }
    public function viewArticle($slug){
        $article = Article::findBySlugOrFail($slug);
        return view('front.users.viewArticle')->with('article', $article);

    }
}
