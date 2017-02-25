<?php

namespace App;
use DB;

class Comment extends Model
{
    public function post() {
    	return $this->belongsTo(Post::class);
    }

    public function saveVisitorComment($visitorComment) {

        DB::table('comments_visitors')->insert($visitorComment);

    }
}

