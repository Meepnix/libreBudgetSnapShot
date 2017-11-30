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
                <div class="panel-heading">Edit Budget Group</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('groups.update', [$group->id]) }}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        Name:<br>
                        <input type="text" name="name" value="{{ $group->name }}"><br>
                        <button type="submit">Save</button>

                    </form>
                    <a href="{{ route('groups.show') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
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

@endsection
