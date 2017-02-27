<?php

namespace App;
use DB;

class Post extends Model
{
	public static function getComments($postid){

        $first = DB::table('comments_visitors');

		$comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->select('comments.*', 'users.name', 'users.user_role')
            ->where('post_id', '=', $postid)
            ->union($first)
            ->orderBy('created_at', 'asc')
            ->get();
         return $comments;
	}

	public static function getAllPosts() {
		$posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->where('posts.is_publish', 1)
            ->orderBy('id', 'desc')
            ->get();

         return $posts;
	}

    public static function getAllPostsByCateg($categ){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->where('posts.is_publish', 1)
            ->where('posts.category', $categ)
            ->orderBy('id', 'desc')
            ->get();

         return $posts;
    }


    public static function getCategCount() {

        $categCount = DB::select( DB::raw("

            SELECT count(*) AS cat FROM posts WHERE category = 'Music' && is_publish = 1
            UNION ALL
            SELECT count(*) AS cat FROM posts WHERE category = 'Fashion' && is_publish = 1
            UNION ALL
            SELECT count(*) AS cat FROM posts WHERE category = 'News' && is_publish = 1
            UNION ALL
            SELECT count(*) AS cat FROM posts WHERE category = 'Apps' && is_publish = 1
            UNION ALL
            SELECT count(*) AS cat FROM posts WHERE category = 'Brand' && is_publish = 1

            ") );

         return $categCount;
    }

    public static function getUserPost($userId) {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->where('users.id', $userId)
            ->orderBy('id', 'asc')
            ->get();

         return $posts;
    }

    public static function getBlogById($id){
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->where('posts.id', $id)
            ->get();

         return $posts;
    }
	
}
