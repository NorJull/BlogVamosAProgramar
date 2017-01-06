<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class TestController extends Controller
{
  

   public function show($id){
   	$article = Article::find($id);

   	echo "This is my firts controller in laraver framework. The ID: ". $id;
   	$article->category;
   	$article->user;
   	$article->tags;

   	dd($article);

   }
}
