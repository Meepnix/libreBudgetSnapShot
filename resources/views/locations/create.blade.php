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
                <div class="panel-heading">Location</div>

                <div class="panel-body">
                    <h2>Provider Name</h2>
                    {{ $provider->name }}

                    <h3>Create Location</h3>

                    <form method="POST" action="/locations/{{ $provider->id }}/store">
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name" value="{{ old('name') }}"><br>
                        <button type="submit">Create location</button>
                    </form

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
