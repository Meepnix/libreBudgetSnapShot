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
                    <h2>Provider Name:</h2>
                    {{ $provider->name }}

                    <h3>Users:</h3>
                    <a href="{{ route('providers.users.create', [$provider->id]) }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create
                    </a>
                    <ul class="list-group">

                    @foreach ($provider->users as $user)
                        <li class="list-group-item clearfix">{{ $user->name }}
                             <span class="pull-right">
                                 <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                <a href="{{ route('providers.users.edit', [$provider->id, $user->id]) }}" class="btn btn-secondary" role="button">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                <form action="{{ route('providers.users.delete', [$provider->id, $user->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>
                                    </button>
                                </form>
                            </span>
                        </li>
                    @endforeach
                    </ul>

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
