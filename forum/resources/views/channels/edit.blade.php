@extends('layouts.app')

@section('content')

                <div class="card-header">Edit Channel:{{$data->channel_name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('channel.update',['channel'=>$data->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                          <input type="text" name="title" class="form-control" value="{{$data->channel_name}}">
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                               <button class="btn btn-xs btn-info" type="submit">Update</button>
                          </div>
                         
                        </div>
                    </form>

                </div>

@endsection
