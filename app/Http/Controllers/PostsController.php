<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use View;
use Auth;

class PostsController extends Controller
{
	public function index() {
		$posts = Post::getAllPosts();
		$categCount = Post::getCategCount();
		return view('visitors.welcome', compact('posts'))->with('categCount', $categCount);
	}    

	public function show(Post $post) {
		$comments = Post::getComments($post->id);
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













	public function showCateg($categ){
		$posts = Post::getAllPostsByCateg($categ);
		$categCount = Post::getCategCount();
		return view('visitors.welcome', compact('posts'))->with('categCount', $categCount);
	}


	public function viewBlogs($userId) {

		$blogLists = Post::getUserPost($userId);
		return view('blogs')->with('blogLists', $blogLists);

	}


	public function viewUpdate($blogId) {

		$blogById = Post::getBlogById($blogId);
		return view('visitors.update')->with('blogById', $blogById);
	}

	public function updateBlog() {

		$this->validate(request(), [				
				'blog_title' 	=> 'required',
				'blog_desc'		=> 'required',
				'blog_category'		=> 'required'
			]);

		Post::find(request('blog_id'))->update([
				'title' 	=> request('blog_title'),
				'body' 		=> request('blog_desc'),
				'category'	=> request('blog_category')
			]);

		Session::flash('success', 'Blog has been updated.');

		return redirect('blogs/' . Auth::user()->id);

	}


	public function updatePublishBlog() {
		Post::find(request('blog_id'))->update([
				'is_publish' 	=> request('check_val')
			]);
		if (request('check_val') == 0) {
			Session::flash('success', 'Blog has been unpublished.');
		}else {
			Session::flash('success', 'Blog has been published.');
		}
		
	}









}
