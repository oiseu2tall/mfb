<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> 
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
</head>
<body>


<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" rel="home" href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            @auth
            <li><a href="{{ route('home') }}">DASHBOARD</a></li>
           <!-- <li><a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('LOGOUT') }}
                                    </a></li>  -->
            @endauth
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
                            @endguest
@auth
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{ Auth::user()->name }} {{ Auth::user()->first_name }} <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li>  <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> </li>
                                    <li class="divider"></li>
@endauth
                <!-- <li><a href="#">Another action</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>-->
              </ul>
            </li>
        </ul>
        @auth
        <div class="col-sm-3 col-md-3 pull-right">
          <form class="navbar-form" action="/search" method="post" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="q" id="q">
                <div class="input-group-btn">
                <button class="btn btn-default" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
          </form>
        </div>
        @endauth
    </div>
</nav>




    

        









@auth

        <main class="py-4">
            
            @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
    

    <script type="text/javascript">
    $(function(){

    $('#slide-submenu').on('click',function() {                 
        $(this).closest('.list-group').fadeOut('slide',function(){
            $('.mini-submenu').fadeIn();    
        });
        
      });

    $('.mini-submenu').on('click',function(){       
        $(this).next('.list-group').toggle('slide');
        $('.mini-submenu').hide();
    })
})

    
</script>


<!--side bar-->
<div class="col-sm-4 col-md-3 sidebar">
    <div class="mini-submenu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </div>
    <div class="list-group">
        <span style="font-size: 22px;" class="list-group-item active">
            QUICK LINKS
            <span class="pull-right" id="slide-submenu">
                <i class="fa fa-times"></i>
            </span>
        </span>
        <a href="{{route('groups.create')}}" class="list-group-item">
          <i class="fa fa-plus" aria-hidden="true"></i> Create New Group</a>
       
        <a href="{{route('customers.create')}}" class="list-group-item">
          <i class="fa fa-plus" aria-hidden="true"></i> Create New Customer</a>

        <a href="{{route(('groups.index'))}}" class="list-group-item">
          <i class="fa fa-list" aria-hidden="true"></i> All Groups</a>

        <a href="{{route('customers.index')}}" class="list-group-item">
          <i class="fa fa-list" aria-hidden="true"></i> All Customers</a>

        <a href="{{route('loans.index')}}" class="list-group-item">
          <i class="fa fa-list" aria-hidden="true"></i> All Loan Stages</a>
@can('isAdmin')
        <a href="{{route('loans.create')}}" class="list-group-item">
          <i class="fa fa-plus" aria-hidden="true"></i> Create New Loan Stage</a>

        <a href="{{route('register')}}" class="list-group-item">
          <i class="fa fa-plus" aria-hidden="true"></i> Create New User</a>
@endcan
            @cannot('isCashOfficer')
        <a href="{{route('credits.index')}}" class="list-group-item">
          <i class="fa fa-list" aria-hidden="true"></i> All Disbursed Loans</a>
          @endcannot


    </div>        
</div><!-- end side bar-->
@endauth

            @yield('content')
        </main>


<!--

<form action="/search" method="post" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" id="q" placeholder="Search Customers"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
-->

</body>

</html>
