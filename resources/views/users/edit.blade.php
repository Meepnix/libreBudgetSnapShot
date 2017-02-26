@extends('layouts.app')

@section('content')
<div class="container">
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
                        <button type="submit">Edit user account</button>

                    </form

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
