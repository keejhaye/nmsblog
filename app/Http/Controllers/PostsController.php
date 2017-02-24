<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use View;

class PostsController extends Controller
{
	public function index() {
		$posts = Post::latest()->get();
		return view('visitors.welcome', compact('posts'));
	}    

	public function show(Post $post) {
		return view('visitors.show', compact('post'));
	}

	public function create() {
		return view('visitors.create');
	}

	public function store() {
		// dd(request()->all());


		$this->validate(request(), [				
				'blog_title' 	=> 'required',
				'blog_desc'		=> 'required',
				'blog_category'		=> 'required'
			]);

		Post::create([
				'title' 	=> request('blog_title'),
				'body' 		=> request('blog_desc'),
				'user_id' 	=> request('user_id'),
				'category'	=> request('blog_category')

			]);

		Session::flash('success', 'Blog has been created.');

		// return View::make('visitors.create')
  //           ->with('target', 'qwe');
		return redirect('/');


	}

}
