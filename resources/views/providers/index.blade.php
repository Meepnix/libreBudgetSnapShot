@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Providers</div>

                <div class="panel-body">
                    <h2>Providers</h2>
                    @foreach ($orgs as $provider)
                        <li><a href="/providers/{{ $provider->id }}">  {{ $provider->name }} </a></li>

                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
