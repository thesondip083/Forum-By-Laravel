<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SocialAuth;
use Auth;

class SocialAuthController extends Controller
{
    public function auth($provider)
    {
       return SocialAuth::authorize($provider);//sending user to social authorization
    }

     public function call_back($provider)
    {
    	//after authorization the user come here by route with provided data 
        SocialAuth::login($provider,function($user,$details)
        	{
               //dd($details); //details of user check before access 
        		//for github the details return
        		//User {#349 ▼
				  #access_token: "c521935d528423ef6ade9a10352a326841d29704"
				  #id: 25960349
				  #nickname: "thesondip083"
				  #full_name: "sondip poul singh"
				  #avatar: "https://avatars3.githubusercontent.com/u/25960349?v=4"
				  #email: "poulsingh083@gmail.com"
				  #raw: array:31 [▶]
        		// Current user is now available via Auth facade
             //  $user = Auth::user();
        	   $user->avatar=$details->avatar;
               $user->name=$details->full_name;
               $user->email=$details->email;
              
               $user->save();
           }
        	   
        	);
        return redirect('/forum/alldiscussions');
    }
}
