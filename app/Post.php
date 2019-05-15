<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	 public static function getLogin($post_id){

  	  	$post = Post::find($post_id);
  	  	return User::find($post->user_id)->name;
  	  }
	 protected $table = "posts";

     protected $fillable = [
        'user_id', 'topic_id', 'post',
    ];

}
