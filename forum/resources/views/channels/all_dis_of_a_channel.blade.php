@extends('layouts.app')

@section('content')

                   <div class="class-card">
                     <div class="card-header text-center">
                      <h3 style="font-family:Courier New"><b> Discussions:{{$channel->channel_name}}</b></h2>
                     </div>
                   </div>
                   <br><br>
                   @if($alldis->count()>0)
                   @foreach($alldis as $data)
                   <!--discussion data as data-->
                   <div class="card">
                       <div class="card-header">
                           <img src="{{$data->user->avatar}}" alt="{{$data->title}}" height="40" width="40">
                           <span> {{$data->user->name}}, <b>{{$data->created_at->diffForHumans()}}</b>

                            <a href="{{route('discussion',['slug'=>$data->slug])}}"  class="btn btn-success float-right">View</a>
                          
                            
                       
                           </span>
                           
                       </div>
                       <div class="card-body">
                            {{str_limit($data->content,200)}}
                       </div>
                       <div class="card-footer text-muted">
                            {{$data->comments->count()}} Reply

                            
                       </div>
                   </div>
                   <br><br> 
                   @endforeach
                   @else
                   <div class="text-center">
                     <h4><b>NO DISCUSSION YET</b></h4>
                   </div>
                   @endif

            <div class="text-right">
                    {{$alldis->links()}}
                    <!--https://laravel.com/docs/5.7/pagination-->
             </div>
 


            
@endsection
