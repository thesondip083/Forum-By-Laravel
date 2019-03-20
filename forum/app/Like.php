<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

   protected $fillable=['comment_id','user_id'];

    public function comment()
    {
    	return $this->belongsTo('App\Comment'); //comment er like
    }
     public function user()
    {
    	return $this->belongsTo('App\User'); //obossoi user like dise
    }
}
