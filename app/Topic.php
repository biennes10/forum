<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Topic extends Model
{
  	  protected $table = "topics";

  	  public function getPosts(){

  	  	return $this->hasMany(Post::class)->get();
  	  }

  	  public static function getLogin($topic_id){

  	  	$topic = Topic::find($topic_id);
  	  	return User::find($topic->user_id)->name;
  	  }
  	   public static function getNb($topic_id){

  	  	$topic = Topic::find($topic_id);
  	  	return $topic->hasMany(Post::class)->count();
  	  }

     protected $fillable = [
        'user_id', 'topic',
    ];
}
