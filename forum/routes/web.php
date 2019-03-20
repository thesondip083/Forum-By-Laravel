<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//for sending request to socialsites
Route::get('{provider}/auth',[
  'uses'=>'SocialAuthController@auth',
  'as'=>'social.auth'
]);


//for receving the feedback from socialsites
//the route is github/redirect what we set in our github redirect
//we send the request and it gives back or return or redirect to //{provide}/redirect=github/redirect

Route::get('{provider}/redirect',[
  'uses'=>'SocialAuthController@call_back',
  'as'=>'social.callback'
]);



//route for channels
//thats how we create multiple route in one line of code
//check php artisan route:list
Route::group(['middleware'=>'auth'],function(){
	Route::resource('channel','ChannelController');//sob route er namer samne 'channel' thakbei r ChannelController use hobe
});

/*| Domain | Method    | URI                    | Name             | Action
                                                         | Middleware   |
+--------+-----------+------------------------+------------------+---------------
---------------------------------------------------------+--------------+
|        | GET|HEAD  | /                      |                  | Closure
                                                         | web          |
|        | GET|HEAD  | api/user               |                  | Closure
                                                         | api,auth:api |
|        | POST      | channel                | channel.store    | App\Http\Contr
ollers\ChannelController@store                           | web,auth     |
|        | GET|HEAD  | channel                | channel.index    | App\Http\Contr
ollers\ChannelController@index                           | web,auth     |
|        | GET|HEAD  | channel/create         | channel.create   | App\Http\Contr
ollers\ChannelController@create                          | web,auth     |
|        | PUT|PATCH | channel/{channel}      | channel.update   | App\Http\Contr
ollers\ChannelController@update                          | web,auth     |
|        | GET|HEAD  | channel/{channel}      | channel.show     | App\Http\Contr
ollers\ChannelController@show                            | web,auth     |
|        | DELETE    | channel/{channel}      | channel.destroy  | App\Http\Contr
ollers\ChannelController@destroy                         | web,auth     |
|        | GET|HEAD  | channel/{channel}/edit | channel.edit     | App\Http\Contr
ollers\ChannelController@edit                            | web,auth     |
*/



Route::get('/discussion/create',[
'uses'=>'DiscussionController@create',
'as'=>'discussion.create'
]);

Route::post('/discussion/store',[
'uses'=>'DiscussionController@store',
'as'=>'discussion.store'
]);

Route::get('/discussion/{slug}',[
'uses'=>'DiscussionController@show',
'as'=>'discussion'
]);

Route::get('/forum/alldiscussions',[
'uses'=>'ForumController@index',
'as'=>'forum.alldiscussions'
]);

Route::get('/forum/mydiscussions',[
'uses'=>'ForumController@mydiscussions',
'as'=>'forum.mydiscussions'
]);



Route::post('/discussion/reply/{id}',[
'uses'=>'DiscussionController@reply',
'as'=>'discussion.reply'
]);

Route::get('/comment/like/{id}',[
'uses'=>'CommentController@like',
'as'=>'comment.like'
]);

Route::get('/comment/unlike/{id}',[
'uses'=>'CommentController@unlike',
'as'=>'comment.unlike'
]);

//to mark the best asnwer
Route::get('/comment/best_reply/{id}',[
'uses'=>'CommentController@best_reply',
'as'=>'comment.best_reply'
]);

//all discussions of a particular channel
Route::get('/channel/alldiscussions/{slug}',[
'uses'=>'ChannelController@alldiscussions',
'as'=>'channel.alldiscussions'
]);


Route::get('/discussion/watch/{id}',[
'uses'=>'WatcherController@watch',
'as'=>'discussion.watch'
])->middleware('auth');

Route::get('/discussion/unwatch/{id}',[
'uses'=>'WatcherController@unwatch',
'as'=>'discussion.unwatch'
])->middleware('auth');


Route::get('/discussion/edit/{id}',[
'uses'=>'DiscussionController@edit',
'as'=>'discussion.edit'
]);

Route::post('/discussion/update/{slug}',[
'uses'=>'DiscussionController@update',
'as'=>'discussion.update'
]);








