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
                <div class="panel-heading">Edit User</div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('providers.update', [$provider->id])}}">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        Organisation Name:<br>
                        <input type="text" name="name" value="{{ $provider->name }}"><br>
                        Address Line 1:<br>
                        <input type="text" name="address1" value="{{ $provider->address1 }}"><br>
                        Address Line 2:<br>
                        <input type="text" name="address2" value="{{ $provider->address2 }}"><br>
                        Post Code:<br>
                        <input type="text" name="post_code" value="{{ $provider->post_code }}"><br>
                        Website Link:<br>
                        <input type="url" name="website" value="{{ $provider->website }}"><br>
                        Telephone No.:<br>
                        <input type="tel" name="phone" value="{{ $provider->phone }}"><br>
                        Fax No.:<br>
                        <input type="tel" name="fax" value="{{ $provider->fax }}"><br>
                        Logo:<br>
                        <input type="text" name="logo_link" value="{{ $provider->logo_link }}"><br>

                        @if (!$provider->active)
                        <input type="radio" name="active" value="0" id="option1" autocomplete="off" checked> Inactive<br>
                        <input type="radio" name="active" value="1" id="option2" autocomplete="off"> Active<br>
                        @else
                        <input type="radio" name="active" value="0" id="option1" autocomplete="off"> Inactive<br>
                        <input type="radio" name="active" value="1" id="option2" autocomplete="off" checked> Active<br>
                        @endif

                        <button type="submit">Edit provider account</button>

                    </form>

                    <a href="{{ route('providers.show') }}" class="btn btn-default">Back</a>

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
