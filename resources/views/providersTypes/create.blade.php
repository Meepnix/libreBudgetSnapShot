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
                <div class="panel-heading">
                    <h2>{{ $provider->name }}</h2>
                </div>

                <div class="panel-body">


                    <h3>Create user account</h3>

                    <form method="POST" action="#">
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name" value="{{ old('name') }}"><br>
                        Title:<br>
                        <input type="text" name="title" value="{{ old('title') }}"><br>
                        Description:<br>
                        <input type="text" name="description" value="{{ old('description') }}"><br>
                        <br>

                        {{ Form::select('group_id', $group) }}

                        <button type="submit">Save</button>

                    </form>
                    <a href="{{ route('providers.types.show', [$provider->id]) }}" class="btn btn-default">Back</a>

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
