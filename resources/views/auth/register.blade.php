@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register as</div>

                <div class="panel-body">
                    <ul><a href="{{ route('register.form', ['id' => 0]) }}">User</a></ul>
                    <ul><a href="{{ route('register.form', ['id' => 1]) }}">Recruiter</a></ul>
                </div>
            </div>
        </div>
        @yield('form')
    </div>
</div>
@endsection
