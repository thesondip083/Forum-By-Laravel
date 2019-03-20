<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watcher extends Model
{
    protected $fillable=['discussion_id','user_id'];

    //who want to watch is a user
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    //a discussion will be watched
    public function discussion()
    {
      return $this->belongsTo('App\Discussion');
    }
}
