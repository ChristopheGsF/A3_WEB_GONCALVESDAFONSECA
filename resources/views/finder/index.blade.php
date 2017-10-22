@extends('layouts.app')
@section('content')
    @if (Auth::user()->isRecruiter)
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    @if(isset($user))
                        <a href="{{route('finder.dislike', ['id' => $user->id])}}" class="btn btn-outline-success">
                            Dislike
                        </a>
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            @if(isset($user))
                                <img src="{{asset($user->avatar)}}" alt="avatar_user" height="42" width="42">
                                {{$user->name}}
                            @else
                                You already see all CV !
                            @endif
                        </div>

                        <div class="panel-body">
                            @if(isset($user))
                                <iframe src="{{asset($user->file)}}" width='724' height='1024'></iframe>
                            @endif
                        </div>
                    </div>
                </div>
                @if(isset($user))
                    <div class="col-md-2">
                        <a href="{{route('finder.like', ['id' => $user->id])}}" class="btn btn-outline-success">Like</a>
                    </div>
                @endif
            </div>
        </div>
@endsection
@endif
