@extends('layouts.app')

@section('content')

                   @foreach($datas as $data)
                   <!--discussion data as data-->
                   <div class="card">
                       <div class="card-header">

                           <img src="{{$data->user->avatar}}" alt="{{$data->title}}" height="40" width="40">

                           <span> {{$data->user->name}}, <b>{{$data->created_at->diffForHumans()}}</b>
                            ({{$data->user->point}})

                            <a href="{{route('discussion',['slug'=>$data->slug])}}"  class="btn btn-success float-right">View</a>
                          
                           </span>

                           
                       </div>
                       <div class="card-body">
                            {{str_limit($data->content,200)}}
                       </div>
                       <div class="card-footer text-muted">
                             <a href="{{route('discussion',['slug'=>$data->slug])}}">
                               <span> {{$data->comments->count()}} Reply</span>
                             </a>
                            
                            


                            <span style="float:right;margin:5px;">
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
                            <span style="float:right ;margin:5px;">
                              <a href="{{route('channel.alldiscussions',['slug'=>($data->channel)->slug])}}" class="btn btn-sm btn-info">{{$data->channel->channel_name}}</a>
                            </span>

                           

                            
                       </div>
                   </div>
                   <br><br> 
                   @endforeach

            <div class="text-right">
                    {{$datas->links()}}
                    <!--https://laravel.com/docs/5.7/pagination-->
             </div>
 


            
@endsection
