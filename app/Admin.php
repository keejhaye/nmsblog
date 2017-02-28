<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getAllAuthors(){

        $authors = DB::table('users')
            ->where('user_role', 'author')
            ->orderBy('created_at', 'asc')
            ->get();
         return $authors;
    }

    public static function getAllBlogs() {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orderBy('id', 'desc')
            ->get();

         return $posts;
    }

    public static function updateUserEnable($id, $checkVal){
        DB::table('users')
            ->where('id', $id)
            ->update(['is_enabled' => $checkVal]);

        return true;
    }

    public static function updateBlogPublish($id, $checkVal){
        DB::table('posts')
            ->where('id', $id)
            ->update(['is_publish' => $checkVal]);

        return true;
    }




}
