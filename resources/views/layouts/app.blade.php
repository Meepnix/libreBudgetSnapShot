<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
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
                    <a href="{{ route('locations.show')}}">Locations</a>
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
                <!-- Show providers, super admin access to do -->
                <li>
                    <a href="{{ route('providers.show')}}">Providers</a>
                </li>

                <li>
                    <a href="{{ route('groups.show')}}">Budget Groups</a>
                </li>


            </ul>
        </div>
        @endif

       <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                    @if (!Auth::guest())
                        <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">
                            <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                        </a>
                    @endif
                    </div>
                    <div class="col">
                        <span class="pull-right">

                        @if (Auth::guest())
                            <a href="{{ url('/login') }}">Login</a>
                        @else

                        <!-- Authentication Links -->

                                <div class="dropdown">
                                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i>&nbsp;{{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('users.edit', [Auth::user()->id]) }}">Account</a>
                                        <a class="dropdown-item" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                                    </div>
                                </div>




                        @endif
                        </span>

                    </div>
                </div>




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
