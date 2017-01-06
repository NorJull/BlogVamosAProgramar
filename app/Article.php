<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Article extends Model
{

    use Sluggable;

    protected $table = "articles";
    protected $fillable = ['title','content','category_id','user_id'];


      public function category()
    {
        return $this->belongsTo('App\Category');
    }

        public function user()
    {
        return $this->belongsTo('App\User');
    }

     public function images()
    {
        return $this->hasMany('App\Image');
    }


  	public function tags()
    {
        return $this->belongsToMany('App\Tag', 'article_tag');
    }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
  public function scopeTitle($query, $title)
    {
      //trim para quitar espacios
    $title = trim($title);
        return $query->where('title', 'LIKE', "%$title%");
    }

}
