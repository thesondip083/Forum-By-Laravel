<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use Session;
use App\Comment;

class CommentController extends Controller
{
    public function like($id) //storing data in the like table. Here id is comment_id
    {
       Like::create([
       'comment_id'=>$id,
       'user_id'=>Auth::id(),
       ]);
       Session::flash('info','You liked a Comment!');
       return redirect()->back();
    }


    public function unlike($id) 
    {
       $del=Like::where('comment_id',$id)->where('user_id',Auth::id())->first();
       //comment er id r current user er id jei column a thakbe seita khuje delete
       //karon unlike kora mane like table a oi userer oi comment a sei likethakbe na 
       $del->delete();
       Session::flash('info','You disliked a Comment!');
       return redirect()->back();
    }


  public function best_reply($id)
  {
    $comment=Comment::find($id);
    if($comment->user_id!=Auth::id()) //user cant increase his/her own point
    {
        $comment->user->point+=10; //otherwise point increased by 10
        $comment->user->save();
        Session::flash('info','Point does not increase');
    }
    $comment->best_reply=1;
    $comment->save();
    Session::flash('info','You marked this as best answer!');
    return redirect()->back();
  }
}
