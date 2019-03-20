@extends('layouts.app')

@section('content')


            <div class="card">
           
                <div class="card-header"> 
                	<div class="text-center">
                		<h4><b>{{$data->title}}</b></h4>
                    <!--$data is particular discussion data-->
                	</div>
                	
                	
                	<img src="{{$data->user->avatar}}" alt="$data->title" height="50" width="50">
                	
                <span>
                	<b>{{$data->user->name}}</b>,{{$data->created_at->diffForHumans()}}
                  ({{$data->user->point}})
                </span>

                <span class="float-right">
                  @if($data->auth_user_watched())
                  <a href="{{route('discussion.unwatch',['id'=>$data->id])}}" class="btn btn-sm btn-danger">UnWatch</a>
                   <!--if already watch show unwatch-->
                  @else
                  <a href="{{route('discussion.watch',['id'=>$data->id])}}" class="btn btn-sm btn-success">Watch</a>
                  @endif
                </span>

                </div>

                <div class="card-body">
                  <!--https://github.com/GrahamCampbell/Laravel-Markdown-->
                    {!!Markdown::convertToHtml($data->content)!!}
                   
                </div>
                <div class="card-footer">

                  <span>{{$data->comments->count()}} Reply</span>

                	<span style="float:right;margin:5px;">
                    <a href="{{route('channel.alldiscussions',['slug'=>$data->channel->slug])}}" class="btn btn-sm btn-primary"> {{$data->channel->channel_name}}</a>
                  </span>



                  <span style="float:right;margin:5px;">
                     <!--adding margin will create space between buttons-->
                     @if($data->hasBestAnswer())
                        <button class="btn btn-danger btn-sm">Closed</button>
                      @else
                        <button class="btn btn-secondary btn-sm">Open</button>
                        <!--dis open thaklei kbol edit kora jabe-->
                         @if($data->user_id==Auth::id())
                           
                           <a href="{{route('discussion.edit',['id'=>$data->id])}}" class="btn btn-primary btn-sm">Edit</a>
                           
                         @endif 
                      @endif
                       
                    </span>
                </div>
            </div>


           <br>
            
             @if($brply)
             <div class="card border-info mb-3" style="padding: 50px">
              <div class="text-center">
                       <b><h4>Best Answer</h4></b>
              </div>
               <div class="card-header text-center text-white bg-dark mb-3">
                     
                     <img src="{{$brply->user->avatar}}" alt="{{$data->title}}" height="43" width="43">
                     <span><b>{{$brply->user->name}}</b></span>
                     ({{$brply->user->point}})
                   </div>
                   <div class="card-body" style="padding: 20px">
                     
                       {!!Markdown::convertToHtml($brply->content)!!}
                   </div>
             </div>
                   
             @endif
             <br>
             <br>

            @foreach($data->comments as $reply)
            <div class="card">
           
                <div class="card-header"> 
                	
                
                <img src="{{$reply->user->avatar}}" alt="{{$data->title}}" height="40" width="40">
                	
                <span>
                	<b>{{$reply->user->name}}</b>,{{$reply->created_at->diffForHumans()}}
                   ({{$reply->user->point}})
                </span>

                <!--jodi best_reply na thake taile vitore jabe-->
                @if(!$brply) 
                @if($data->user_id==Auth::id())
                <!--jei auth user dis ta likse sei kbol best ans mark korbe-->
                <span style="float:right">
                  <a href="{{route('comment.best_reply',['id'=>$reply->id])}}" class="btn btn-secondary btn-sm">mark as best answer</a>
                </span>
                @endif
                @endif


                </div>

                <div class="card-body">
                    {!!Markdown::convertToHtml($reply->content)!!}
                </div>

                <div class="card-footer">

                @if(Auth::check())
                	 
                 @if($reply->is_liked_by_authuser()) <!--reply is a comment. Function is written in Comment.php-->
                      <a href="{{route('comment.unlike',['id'=>$reply->id])}}" class="btn btn-xs btn-danger">Unlike<span class="badge badge-secondary">{{$reply->likes()->count()}} </span></a>
  
                 @else
                      <a href="{{route('comment.like',['id'=>$reply->id])}}" class="btn btn-success">Like <span class="badge badge-light">{{$reply->likes()->count()}} </span></a>

                   <!--  //badges->https://getbootstrap.com/docs/4.3/components/badge/
                    -->

                 @endif

                @else
                <a href="/login" class="btn btn-xs btn-primary">likes<span class="badge badge-secondary">{{$reply->likes()->count()}} </span></a>
                @endif



                </div>
                
                 
            </div>
            <br>
            @endforeach

            
            @if(Auth::check())
              @if(!$data->hasBestAnswer())
              <div class="card">

              	<div class="card-header">
              		<label for="comment"><h5><b>Leave a Reply</b></h5></label>
              	</div>

              	
  	               <div class="card-body">
                         <form action="{{route('discussion.reply',['id'=>$data->id])}}" method="post">

                         	@csrf
                         	<div class="form-group">
                         	   <textarea name="reply" id="comment" cols="30" rows="10" class="form-control"></textarea>
                         	</div>
                         	<div class="form-group">
                         		<div class="text-right">
                         			<button class="btn btn-info" type="submit">Submit</button>
                         		</div>
                         		
                         	</div>
  	            		
                         </form>

  	               </div>
              </div>
              @else
                 <div class="text-center">
                   <h4><b>The discussion is closed!</b></h4>
                 </div>
              @endif
             @else
             <div class="text-center">
               <h4><b>Log in for Reply</b></h4>
             </div>

             @endif

            
@endsection
