<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Watcher;
use Auth;
use App\User;

class WatcherController extends Controller
{
    public function watch($id)
    {
      Watcher::create([
      'discussion_id'=>$id,
      'user_id'=>Auth::id()
      ]);
      Session::flash('info','You watched the discussion!');
      return redirect()->back();
    }

    public function unwatch($id)
    {
      $w=Watcher::where('discussion_id',$id)->where('user_id',Auth::id());
      $w->delete();
      Session::flash('info','You Unwatched the discussion!');
      return redirect()->back();
    }
}
