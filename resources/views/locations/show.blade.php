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
                <div class="panel-heading">Locations</div>

                <div class="panel-body">
                    <h2>Locations:</h2>

                    @foreach ($providers as $key => $provider)
                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="heading{{ $key }}">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}">
                                        {{ $provider->name }}
                                    </a>
                                </h5>
                                <span class="pull-right">
                                    <a href="{{ route('locations.create', [$provider->id]) }}" class="btn btn-primary">
                                        <i class="fa fa-btn fa-plus-square"></i>Create
                                    </a>
                                </span>
                            </div>

                            <div id="collapse{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                <div class="card-body">
                                    @foreach ($provider->locations as $location )
                                    <li class="list-group-item clearfix">
                                        {{ $location->name }}
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            </div>
        </div>
    </div>
</div>
@endsection
