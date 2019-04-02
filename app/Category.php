<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Category extends Model
{
    protected $table = "categories";

    public function post() {
    	return $this->hasMany('App\Post');
    }
    public function parent() {
        return $this->belongsTo(static::class, 'parent_id');
    }
    public function getPost($id){
    	$post = Post::where('cat_id', $id)->limit(4)->get();
    	return $post;  
    }
}
