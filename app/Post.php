<?php

namespace App;
use DB;

class Post extends Model
{
	public function getComments($postid){

        $first = DB::table('comments_visitors');

		$comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name', 'users.user_role')
            ->orderBy('id', 'asc')
            ->where('post_id', '=', $postid)
            ->union($first)
            ->get();
         return $comments;
	}

	public function getAllPost() {
		$posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orderBy('id', 'desc')
            ->get();

         return $posts;
	}
	
}
