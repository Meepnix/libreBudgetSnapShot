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
                    <h2>Create Provider</h2>

                    <form method="POST" action="{{ route('providers.store') }}">
                        {{ csrf_field() }}
                        Organisation Name:<br>
                        <input type="text" name="name" value="{{ old('name') }}"><br>
                        Address Line 1:<br>
                        <input type="text" name="address1" value="{{ old('address1') }}"><br>
                        Address Line 2:<br>
                        <input type="text" name="address2" value="{{ old('address2') }}"><br>
                        Post Code:<br>
                        <input type="text" name="post_code" value="{{ old('post_code') }}"><br>
                        Website Link:<br>
                        <input type="url" name="website" value="{{ old('website') }}"><br>
                        Telephone No.:<br>
                        <input type="tel" name="phone" value="{{ old('phone') }}"><br>
                        Fax No.:<br>
                        <input type="tel" name="fax" value="{{ old('fax') }}"><br>
                        Logo:<br>
                        <input type="text" name="logo_link" value="{{ old('logo_link') }}"><br>

                        <button type="submit">Add user account</button>

                    </form>
                    <a href="{{ route('providers.show') }}" class="btn btn-default">Back</a>

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
