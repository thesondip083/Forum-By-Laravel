<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{


	  protected $fillable = [
        'discussion_id','user_id','content',
    ];

    //comment belongs to a user
    public function user()
    {
    	return $this->belongsTo('App\User');
    }


    //comment belongs to a discussion
    public function discussion()
    {
    	return $this->belongsTo('App\Discussion');
    }


   //akta comment er onek like thakbe
     public function likes()
    {
        return $this->hasMany('App\Like');
    }


    public function is_liked_by_authuser()
    {
       $id=Auth::id(); //id of current user
       $likers=array(); //array for likers who liked the comment

       foreach($this->likes as $like): //current post a jei koita like ache
         array_push($likers,$like->user_id); //tader id gula store korbo array te
       endforeach;

       if(in_array($id,$likers)) //liker der id er moddhe current user o jodi thake taile aita true return korbe r true paile Unlike button dekhano hobe.(show.b.p)
       {
        return true;
       }
       else
       {
        return false; //like deya na thakle like button e dekhabe
       }
    }
}
