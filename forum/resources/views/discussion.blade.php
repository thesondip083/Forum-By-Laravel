@extends('layouts.app')

@section('content')
                <div class="card text-white bg-info mb-3">
                  <div class="card-header">Lets Discuss</div>

                <div class="card-body ">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('discussion.store')}}" method="post">
                        @csrf


                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" name="title" required>
                        </div>

                        <div class="form-group">
                          <label for="select">Select a Channel</label>
                           <select name="channel_id" id="select" class="form-control">
                           @foreach($channels as $channel)
                           <option value="{{$channel->id}}">
                           
                            {{$channel->channel_name}}
                            
                           </option>
                          @endforeach
                          </select>
                        </div>

                        
                        <div class="form-group">
                          <label for="text">Ask a Question:</label>
                           <textarea name="content" id="txt" cols="30" class="form-control" rows="7"   required></textarea>
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                               <button class="btn btn-xs btn-success" type="submit"><b>Create</b></button>
                          </div>
                         
                        </div>
                    </form>

                </div>
            
                </div>
                

@endsection
