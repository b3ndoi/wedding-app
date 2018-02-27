<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="{{ asset('css/materialize.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">  
    <link href="{{ asset('css/grid.css') }}" rel="stylesheet">    
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
    <div id="app">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Wedding platform</h5>
      <nav class="my-2 my-md-0 mr-md-3">
      @if (!Auth::guest())
        <a class="p-2 text-dark" href="{{ route('events.index') }}">Venčanja</a>
      @endif
      @if (Auth::guest())
        <a class="btn btn-outline-success" href="{{ route('login') }}">Login</a>
        <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
      @else
        <a class="p-2 text-dark" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      @endif
      </nav>
      
    </div>
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>    
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    @yield('scripts')
</body>
</html>
