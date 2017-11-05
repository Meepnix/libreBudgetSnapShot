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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ URL::asset('css/sidebar2.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>


<body>
    <div id="wrapper">

       <!-- Sidebar -->
       @if (!Auth::guest())
       <div id="sidebar-wrapper">
           <ul class="sidebar-nav">
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
                @can('isAdmin', Auth::user()->providers)

                     <li>
                         <a href="{{ route('providers.users.show', Auth::user()->providers->id) }}">Users</a>
                     </li>

                @endcan

            </ul>
        </div>
        @endif

       <!-- /#sidebar-wrapper -->

       <div id="page-content-wrapper">
           <div class="container-fluid">
           @if (Auth::guest())
               <a href="{{ url('/login') }}">Login</a>
           @else
           <ul>
               <!-- Authentication Links -->

                   <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">
                       <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                   </a>
                   <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                           {{ Auth::user()->name }} <span class="caret"></span>
                       </a>

                       <ul class="dropdown-menu" role="menu">
                           <li><a href="{{ route('users.edit', [Auth::user()->id]) }}">Account</a></li>
                           <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>

                       </ul>
                   </li>

           </ul>
           @endif



                @yield('content')

            </div>






    </div>
    </div>

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>



    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $(function() {
        // setTimeout() function will be fired after page is loaded
        // it will wait for 2 sec. and then will fire
        // $("#savedMessage").hide() function
        setTimeout(function() {
            $("#savedMessage").hide('blind', {}, 200)
        }, 2000);
    });
    </script>

</body>
</html>
