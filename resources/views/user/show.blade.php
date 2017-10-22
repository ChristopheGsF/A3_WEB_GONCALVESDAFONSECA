@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <img src="{{asset($user->avatar)}}" alt="avatar_user" height="100%" width="100%">

                        </img>
                        <h1>{{$user->name}}</h1>
                    </div>
                    @if($user->id == Auth::user()->id)
                        <div class="panel-body">
                            <form enctype="multipart/form-data" method="POST" action="{{ route('user.store') }}">
                                {{ csrf_field() }}
                                <input name="isAvatarOrCV" value="1" type="hidden">
                                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                                    <input class="btn btn-success" value="{{ old('avatar') }}" type="file" name="avatar"
                                           required/>
                                    @if ($errors->has('avatar'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('avatar') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update Avatar
                                </button>
                            </form>
                            <form enctype="multipart/form-data" method="POST" action="{{ route('user.store') }}">
                                {{ csrf_field() }}
                                <input name="isAvatarOrCV" value="0" type="hidden">
                                <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                                    <input class="btn btn-success" type="file" name="file" required/>
                                    @if ($errors->has('file'))
                                        <span class="help-block">
                            <strong>{{ $errors->first('file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Update File
                                </button>
                            </form>
                            <hr>
                            <p>Recruiters who like your CV</p>
                            @if(isset($recruiters))
                                @foreach($recruiters as $recruiter)
                                    <li>
                                        <img src="{{asset($recruiter->avatar)}}" alt="$recruiter_avatar" height="42px"
                                             width="42px">
                                        <a href="{{route('user.show',['id' => $recruiter->id])}}">{{$recruiter->name}}</a>
                                    </li>
                                @endforeach
                            @endif

                        </div>
                    @endif
                </div>
            </div>
            @if((isset($user->file)))
                <iframe src="{{asset($user->file)}}" width='724' height='1024'></iframe>
            @endif
        </div>

    </div>
@endsection
