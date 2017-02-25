<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use View;

class PostsController extends Controller
{
	public function index() {
		$admin_model = new Post();
		$posts = $admin_model->getAllPost();
		return view('visitors.welcome', compact('posts'));
	}    

	public function show(Post $post) {
		$admin_model = new Post();
		$comments = $admin_model->getComments($post->id);
		return view('visitors.show', compact('post'))->with('comments', $comments);
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
