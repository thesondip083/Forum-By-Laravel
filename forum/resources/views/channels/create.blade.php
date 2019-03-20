@extends('layouts.app')

@section('content')

                <div class="card-header">Create a new Channel</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('channel.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                          <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                          <div class="text-center">
                               <button class="btn btn-xs btn-info" type="submit">Create</button>
                          </div>
                         
                        </div>
                    </form>

                </div>
            

@endsection
