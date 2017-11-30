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
                <div class="panel-heading"><h2>Providers</h2></div>

                <div class="panel-body">

                    <a href="{{ route('providers.create') }}" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus-square"></i>Create Provider
                    </a>
                    <p></p>
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
                                    @if ($provider->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </span>
                            </div>

                            <div id="collapse{{ $key }}" class="collapse" role="tabpanel" aria-labelledby="heading{{ $key }}" data-parent="#accordion">
                                <div class="card-body">
                                    <li class="list-group-item clearfix">
                                        Address Line 1: {{ $provider->address1 }}
                                        <br>
                                        Address Line 2: {{ $provider->address2 }}
                                        <br>
                                        Post code: {{ $provider->post_code }}
                                        <br>
                                        Website Link: {{ $provider->website }}
                                        <br>
                                        Telephone No.: {{ $provider->phone }}
                                        <br>
                                        Fax No.: {{ $provider->fax }}
                                        <br>
                                        Logo: {{ $provider->logo_link }}
                                        <br>
                                        <form action="#" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <a href="{{ route('providers.edit', [$provider]) }}" class="btn btn-secondary" role="link">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Edit
                                            </a>

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </li>
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
