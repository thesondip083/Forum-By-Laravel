@extends('layouts.app')

@section('content')
                <div class="card">
                  <div class="card-header">Lets Discuss</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('discussion.update',['slug'=>$editdata->slug])}}" method="post">
                        @csrf


                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" value="{{$editdata->title}}" name="title" required>
                        </div>

                        <div class="form-group">
                          <label for="select">Select a Channel</label>
                           <select name="channel_id" id="select" value="{{$editdata->channel->channel_name}}" class="form-control">
                           @foreach($channels as $channel)
                           <option value="{{$channel->id}}">
                           
                            {{$channel->channel_name}}
                            
                           </option>
                          @endforeach
                          </select>
                        </div>

                        
                        <div class="form-group">
                          <label for="text">Ask a Question:</label>
                           <textarea name="content" id="txt" cols="30" class="form-control" rows="7" required>{{$editdata->content}}</textarea>
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                               <button class="btn btn-xs btn-secondary" type="submit"><b>Update</b></button>
                          </div>
                         
                        </div>
                    </form>

                </div>
            
                </div>
                

@endsection
