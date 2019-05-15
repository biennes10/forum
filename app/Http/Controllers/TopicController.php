<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Topic;
use App\Post;
class TopicController extends Controller
{





    public function newTopic(Request $req){

    	$topic = $req->input('topic');
    	$id = Auth::user()->id;
    	$created=Topic::create(array(
    		'user_id'=>$id,
    		'topic'=>$topic
    ));
 
    	return view('topic')->with('topic_id',$created->id)->with('topic',$topic);

    }
     public function getTopic($id){
     	
    	$topic = Topic::find($id);

    	return view('topic')->with('posts',$topic->getPosts())->with('topic_id',$topic->id)->with('topic',$topic->topic);

    }

    public function newPost($topic_id,Request $req){

    		$post = $req->input('post');
    		Post::create(array(
    			'user_id'=>Auth::user()->id,
    			'topic_id'=>$topic_id,
    			'post'=>$post

    		));
    		$topic = Topic::find($topic_id);

    	return redirect("topic/$topic_id")->with('posts',$topic->getPosts())->with('topic_id',$topic->id)->with('topic',$topic->topic);


    }


}
