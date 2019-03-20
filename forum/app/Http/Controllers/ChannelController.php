<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Channel;
use Session;
use App\Discussion;

class ChannelController extends Controller
{
    
   public function __construct()
   {
      $this->middleware('admin');
      //used so that all the channel activity only controller by admin
   }

    public function index()
    {
        return view('channels.index')->with('channels',Channel::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request,[
        'title'=>'required',
       ]);

       Channel::create([
        'channel_name'=>$request->title,
        'slug'=>str_slug($request->title)
       ]);

       Session::flash('info','successfully created a channel');
       return redirect()->route('channel.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Channel::find($id);
        return view('channels.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'title'=>'required',
        ]);
        $data=Channel::find($id);
        $data->channel_name=$request->title;
        $data->slug=str_slug($request->title);
        $data->save();
        Session::flash('info','successfully updated the channel name');
        return redirect()->route('channel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Channel::find($id);
        $data->delete();
        Session::flash('info','successfully Deleted the channel');
        return redirect()->route('channel.index');
    }


    public function alldiscussions($slug)
    {
        //cd=channel data
      // dd($slug);
       $cd=Channel::where('slug',$slug)->first();
       return view('channels.all_dis_of_a_channel')->with('alldis',$cd->discussions()->paginate(5))->with('channel',$cd);
    }
}
