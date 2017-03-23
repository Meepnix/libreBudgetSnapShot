<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ URL::asset('css/sidebar.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>


<body id="app-layout">
    <div id="wrapper">
       <div class="overlay"></div>

       <!-- Sidebar -->
       @if (!Auth::guest())
       <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
           <ul class="nav sidebar-nav">
               <li class="sidebar-brand">
                   <a href="#">
                      {{ Auth::user()->providers->name }}
                   </a>
               </li>
               <li>
                   <a href="#">Home</a>
               </li>
               <li>
                   <a href="#">Account</a>
               </li>
               <li>
                   <a href="#">Provider Profile</a>
               </li>
               <li>
                   <a href="#">Statistics</a>
               </li>

               <!-- Show user accounts to provider admin -->
               @can('adminUser', Auth::user()->providers)

                    <li>
                        <a href="/providers/{{ Auth::user()->providers->id }}/users">Users</a>
                    </li>

               @endcan

           </ul>
       </nav>
       @endif

       <!-- /#sidebar-wrapper -->
       @if (!Auth::guest())
       <div id="page-content-wrapper">

            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>
        @endif

            <div class="container">

            <ul>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <a href="{{ url('/login') }}">Login</a>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>




    @yield('content')

    </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <script src="{{ URL::asset('js/sidebar.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
