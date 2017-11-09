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
                            @if (!(Auth::user()->name === $user->name))
                                <a href="{{ route('providers.users.edit', [$provider->id, $user->id]) }}" class="btn btn-secondary" role="button">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit
                                </a>
                                
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                    <i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete
                                </a>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Do you wish to continue and delete user {{ $user->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('providers.users.delete', [$provider->id, $user->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">Yes
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                            <button type="button" aria-disabled="true" class="btn btn-secondary" disabled><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit</button>
                            <button type="button" aria-disabled="true" class="btn btn-danger" disabled><i class="fa fa-btn fa-trash" aria-hidden="true"></i>Delete</button>
                            @endif
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
