@extends('layouts.app')

@section('content')


<div class="container">
    @if (session()->has('flash_message'))
        <div id="savedMessage" class="alert alert-success" role="alert">
            {{ session()->get('flash_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">

                    <form method="POST" action="/users/{{ $user->id }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name" value="{{ $user->name }}"><br>
                        Email:<br>
                        <input type="text" name="email" value="{{ $user->email }}"><br>
                        <br>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#resetModal">
                            <i class="fa fa-btn fa-repeat" aria-hidden="true"></i>Reset Password
                        </a>
                        <br>
                        
                        <br>
                        <button type="submit">Edit user account</button>
                       
                    
                    </form>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="resetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reset password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body">
                                    <form action="/users/{{ $user->id }}" method="POST">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
                                        Password:<br>
                                        <input type="password" name="password"><br>
                                        Confirm Password:<br>
                                        <input type="password_confirmation" name="password"><br>
                                                    
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                        </button>
                                        <button type="submit" class="btn btn-danger">Rest
                                        </button>
                                    </form>
                                </div>
                            </div>
                                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
