<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

   


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/styles/atom-one-dark.min.css">
    <!--for highlight js https://github.com/highlightjs/highlight.js/-->
  


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                      @if(Auth::check())
                      <a href="{{route('discussion.create')}}" class="form-control btn btn-primary"><h5><b><i>Create a New Discussion</i></b></h5></a>
                      <br><br>
                      @else
                     <a href="/login" class="form-control btn btn-primary"><h5><b><i>Create a New Discussion</i></b></h5></a>
                     
                     
                      @endif
                         <div class="card">
                             <div class="card-header">
                                 
                             </div>
                             <div class="card-body">
                                  <li class="list-group-item">
                                        <a href="{{route('forum.alldiscussions')}}" style="text-decoration:none">Home</a>
                                  </li>
                                  <li class="list-group-item">
                                        <a href="{{route('forum.mydiscussions')}}" style="text-decoration:none">My discussions</a>
                                  </li>

                             </div>
                         </div>
                        <div class="card">
                            <div class="card-header">
                                <b>Channels</b>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <!--$channel doesnt exist here so we go to AppServiceProvider.php to boot it(by boot it means to store something new which we want to use everywhere in our application)-->
                                   
                                @if(auth::check())
                                    @if(Auth::user()->admin)
                                    <li class="list-group-item">
                                        <a href="{{route('channel.create')}}" style="text-decoration:none">Create Channel</a>
                                    </li>
                                    @endif
                                @endif
                                    @foreach($channels as $channel)
                                    <li class="list-group-item">
                                        <a href="{{route('channel.alldiscussions',['slug'=>$channel->slug])}}" style="text-decoration:none">{{$channel->channel_name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                          @yield('content')
                    </div>
                </div>
            </div>
          
        </main>
    </div>

 <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
     <script src="{{ asset('js/toastr.min.js') }}"></script>

<script>
    @if(Session::has('info'))
      toastr.success("{{Session::get('info')}}");
    @endif
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.15.6/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>

</body>
</html>
