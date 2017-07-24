<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ Session::token() }}"/>
    <title>Jumping Notes</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,600i,700,700i,800,900,900i">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="{{asset('/public/css/style.css') }}" rel="stylesheet">

    <link href="{{asset('/public/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/public/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('/public/css/star-rating.css')}}" media="all" type="text/css"/>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
    <!-- Toastr CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!-- Select2 css/js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        braintree.setup("@braintreeClientToken", "<integration>", options);
    </script>

</head>
<body class="home">

<nav class="main-nav navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand logo" href="{{route('home')}}"><img src="{{asset('/public/dynamic_assets/1495873280-j_logo.png')}}" alt=""/></a>
        </div>
        <div class="collapse navbar-collapse " id="myNavbar">
            <ul class="nav navbar-nav nav-right navbar-right">
                <li><a href="{{ route('about_index') }}">About Us</a></li>
                @if(Auth::check())
                <li><a href="{{route('profile_index')}}">Profile</a></li>
                @endif
                {{--<li><a href="#">Transaction</a></li>--}}
                <li><a href="{{route('notes_index')}}">Notes</a></li>
                <li><a href="{{route('tutorsView')}}">Find Tutor</a></li>
                @if(Auth::check())
                   <!-- <li><a href="{{route('logout')}}">Log Out</a></li> -->
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Hi! {{strtoupper(Auth::user()->username)}}, <small style="font-weight: 200;font-size: 75%"> @if($tutor_globalflag) Tutor @else Student @endif </small> <span class="caret"></span></a>

                      <ul class="dropdown-menu" role="menu">

                        {{--<li><a href="{{ route('notesView') }}">Your Notes</a></li>--}}
                        {{--<li><a href="{{ route('inbox_index') }}">Messages</a></li>--}}
                        <li class="popup"><a href="{{ route('notesView') }}">Your Notes <span>{{$your_note_count }}</span></a></li>
                        <li class="popup"><a href="{{ route('inbox_index') }}">Chat Room <span>{{Config::get('unread_msgs')}}</span></a></li>
                          @if(!$tutor_globalflag)
                          <li><a href="{{route('tutorRegisterView')}}">Become Tutor</a></li>
                          @endif
                          @if(Auth::user()->id == 1)
                          <li><a href="{{route('dashboard')}}">Admin Dashboard</a></li>
                          @endif

                        <li><a href="{{ route('requestsView') }}">Your Requests</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>

                      </ul>
                    </li>
{{--                       <li> <a> <i class="fa fa-user"></i> Hi! {{strtoupper(Auth::user()->username)}}, <small style="font-weight: 200;font-size: 75%"> @if($tutor_globalflag) Tutor @else Student @endif </small></a></li>--}}
                @else
                <li><a href="{{route('auth_view')}}">Login/Sign Up</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>
