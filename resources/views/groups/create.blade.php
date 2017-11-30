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
                <div class="panel-heading"><h2>Budget Group</h2></div>

                <div class="panel-body">

                    <h3>Create Budget Group</h3>

                    <form method="POST" action="{{ route('groups.store')}} ">
                        {{ csrf_field() }}
                        Group Name:<br>
                        <input type="text" name="name" value="{{ old('name') }}"><br>
                        <button type="submit">Create Group</button>
                    </form>

                    <a href="{{ route('groups.show') }}" class="btn btn-default">Back</a>

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
