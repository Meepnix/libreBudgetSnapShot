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
                    <h2>Providers</h2>
                    @foreach ($orgs as $provider)
                        <li><a href="/providers/{{ $provider->id }}">  {{ $provider->name }} </a></li>

                    @endforeach

                    <!-- Start-->

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
                                        <span class="pull-right">
                                            <ul style="list-style-type:none">

                                            <li>
                                                <form action="{{ route('locations.delete', [$location->id]) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <a href="{{ route('locations.edit', [$location->id]) }}" class="btn btn-secondary" role="link">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit
                                                    </a>

                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-btn fa-trash"></i>Delete
                                                    </button>
                                            </li>
                                            </form>
                                            </ul>
                                        </span>
                                    </li>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
