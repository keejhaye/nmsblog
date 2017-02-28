<?php

namespace App;
use DB;

class Comment extends Model
{
    public function post() {
    	return $this->belongsTo(Post::class);
    }

    public static function saveVisitorComment($visitorComment) {

        DB::table('comments_visitors')->insert($visitorComment);

    }

    public static function saveAuthorComment($visitorComment) {

        DB::table('comments')->insert($visitorComment);

    }
}

