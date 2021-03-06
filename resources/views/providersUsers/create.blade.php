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
                <div class="panel-heading">Providers</div>

                <div class="panel-body">
                    <h2>Provider Name</h2>
                    {{ $provider->name }}

                    <h3>Create user account</h3>

                    <form method="POST" action="/providers/{{ $provider->id }}/users/store">
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name" value="{{ old('name') }}"><br>
                        Email:<br>
                        <input type="text" name="email" value="{{ old('email') }}"><br>
                        Password:<br>
                        <input type="password" name="password"><br>
                        Confirm Password:<br>
                        <input type="password" name="password_confirmation"><br>
                        Type:<br>
                        <select name="type">
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                        </select>

                        <br>
                        <button type="submit">Save</button>

                    </form>
                    <a href="{{ route('providers.users.show', [$provider->id]) }}" class="btn btn-default">Back</a>

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
