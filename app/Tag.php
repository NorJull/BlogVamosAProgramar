<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tags";
    protected $filable = ['name'];


    	public function articles()
    {
        return $this->belongsToMany('App\Article', 'article_tag')->withTimestamps();
    }

    public function scopeName($query, $name)
    {
    	//trim para quitar espacios
		$name = trim($name);
        return $query->where('name', 'LIKE', "%$name%");
    }
    public function scopeSearch($query, $name)
    {
        $name = trim($name);
        return $query->where('name', '=', $name);
    }
}
