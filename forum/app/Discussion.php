<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Discussion extends Model
{
    protected $fillable=['channel_id','user_id','title','content','slug'];

    public function channel()
    {
    	return $this->belongsTo('App\Channel');
    }

     public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

     public function user()
    {
    	return $this->belongsTo('App\User');
    }
   
    //a discussion have many watchers
    public function watchers()
    {
        return $this->hasMany('App\Watcher');
    }


    public function auth_user_watched()
    {
        $id=Auth::id();
        $watchers_of_the_discussion=array();
        foreach($this->watchers as $watcher):
            array_push($watchers_of_the_discussion,$watcher->user_id);
        endforeach;
        if(in_array($id,$watchers_of_the_discussion))
        {
           return true;
        }
        else
        {
           return false;
        }
    }

    public function hasBestAnswer()
    {
        $res=false;
        foreach($this->comments as $commnet)
        {
            if($commnet->best_reply)
            {
                 $res=true;
                 break;
            }
        }

        return $res;
    }

}

