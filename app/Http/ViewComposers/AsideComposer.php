<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\UserRepository;
use App\Category;
use App\Tag;
use App\Article;
class AsideComposer
{
    
    public function compose(View $view)
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        $view->with( 'categories', $categories)->with('tags',$tags);
    }
}