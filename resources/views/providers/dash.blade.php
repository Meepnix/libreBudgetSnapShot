@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $provider->name }}</div>

                <div class="panel-body">
                    <h2>Menu</h2>
                        <li><a href="/providers/{{ $provider->id }}/users">Users</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
