<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Session;

class CommentsController extends Controller
{
    public function store(Post $post){

		$this->validate(request(), [				
				'body' 	=> 'required'
			]);

        Comment::saveAuthorComment([
                'body' => request('body'),
                'post_id' => request('post_id'),
                'user_id' => request('user_id')
            ]);

		Session::flash('success', 'Comment added.');

    	return back();
    }

    public function storeVisitor(Post $post) {

        $this->validate(request(), [                
                'body'  => 'required',    
                'name'  => 'required'
            ]);


        Comment::saveVisitorComment([
                'body' => request('body'),
                'post_id' => request('post_id'),
                'name' => request('name')
            ]);


        Session::flash('success', 'Comment added.');

        return back();
    }
}
