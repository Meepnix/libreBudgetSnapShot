@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Providers</div>

                <div class="panel-body">
                    <h2>Provider Name:</h2>
                    {{ $provider->name }}

                    <h3>Users:</h3>
                    @foreach ($provider->users as $user)
                        <li>{{ $user->name }}</li>
                    @endforeach

                    <form method="POST" action="/providers/{{ $provider->id }}/users">
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name"><br>
                        Email:<br>
                        <input type="text" name="email"><br>
                        Password:<br>
                        <input type="password" name="password"><br>

                        <br>
                        <button type="submit">Add user account</button>

                    </form

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
