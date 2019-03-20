@extends('layouts.app')

@section('content')
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-hover">
                      <thead>
                          <th>Channel name</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                             
                             
                             
                              @foreach($channels as $channel)
                                  <tr>
                                 <td>{{$channel->channel_name}}</td>
                                 <!--channel/{channel}/edit-->
                                 
                                 <td><a href="{{route('channel.edit',['channel'=>$channel->id])}}" class="btn btn-xs btn-success">Edit</a></td>
                                 <td>
                          <form action="{{route('channel.destroy',['channel'=>$channel->id])}}" method="post">
                                    @csrf
                                    @method('DELETE') <!--the route needs this for Spoofing Form Methods
                                    check https://laravel.com/docs/5.7/controllers#resource-controllers-->
                                 <button type="submit" class="btn btn-xs btn-danger">Delete</button>

                          </form>
                                 </td>
                             
                                </tr>
                             @endforeach
                             
                      </tbody>
                    </table>
                  
                     </div>
            </div>
       
@endsection
