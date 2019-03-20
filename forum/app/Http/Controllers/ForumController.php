<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\pagination\paginator;//since we cant use pagination on array
use App\Discussion;
use Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Discussion::orderBy('created_at','desc')->paginate(3);
        return view('forum.alldis')->with('datas',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   
     public function mydiscussions()
    {
        $id=Auth::id();
       // dd($id);
        $ad=Discussion::all();
        $aldi=array();
        foreach($ad as $d)
        {
            if($d->user_id==$id)
            {
              array_push($aldi,$d);
            }
        }
        //dd($aldi);
         $data2=new paginator($aldi,15);
        //dd($data2);
        return view('forum.alldis')->with('datas',$data2);
        //this paginate but when press the next page it goes to the home page

    }

}
