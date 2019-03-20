<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Notification;
use App\User;
use App\Channel;
use App\Comment;
use App\BestReply;
use App\Discussion;


class DiscussionController extends Controller
{


    public function create()
    {
    	return view('discussion');
    }


    public function store(Request $request) 
    {
      $this->validate($request,[     //request() nileo hoi tkhn Request $request likte lagena
        'content'=>'required',
        'channel_id'=>'required',
      ]);
      
    //  $data=Channel::find($request->channel_id);
       $dis=Discussion::create([
      'channel_id'=>$request->channel_id,
      'user_id'=>Auth::id(),
      'title'=>$request->title,
      'slug'=>str_slug($request->title),
      'content'=>$request->content,
      ]);

     Session::flash('info','A new Discussion Arises!');
     return redirect()->route('discussion',['slug'=>$dis->slug]);

    }




    public function show($slug)
    {
     // $pp=Discussion::where('slug',$slug);
      //dd($pp);//br=best-reply
     $dis=Discussion::where('slug',$slug)->first();
     $brply=$dis->comments()->where('best_reply',1)->first();
     return view('discussions.show')
                                   ->with('data',$dis)
                                   ->with('brply',$brply);
    }






    public function reply(Request $request,$id)
    {

      //dd($id);
      $this->validate($request,[
      'reply'=>'required'
      ]);
      
      $d=Discussion::find($id);//for sending notification

      Comment::create([
        'discussion_id'=>$id,
        'user_id'=>Auth::id(),
        'content'=>$request->reply,
      ]);


      $watchers=array();
 
      foreach($d->watchers as $watcher):
      array_push($watchers, User::find($watcher->user_id));//User::find() na dile kaj korena
      endforeach;

     // dd($watchers);

      Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));
      
      Session::flash('info','Successful Commenting!');
      return redirect()->back();

    }



    public function edit($id)
    {
        $dis=Discussion::find($id);
        return view('discussions.edit')->with('editdata',$dis);
    }

    
    public function update($slug)
    {
        $disdata=Discussion::where('slug',$slug)->first();
        $disdata->title=request()->title;
        $disdata->channel_id=request()->channel_id;
        $disdata->content=request()->content;
        $disdata->slug=str_slug(request()->title);
        $disdata->save();
        Session::flash('info','Successfully Updated!!');
        return redirect()->route('discussion',['slug'=>$disdata->slug]);
        
    }



}