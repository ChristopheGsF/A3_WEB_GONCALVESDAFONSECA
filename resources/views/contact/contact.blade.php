@extends('layouts.app')
@section('content')
    @include('messages.success')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Contact</div>

                    <div class="panel-body">
                        <form class="form-horizontal" action='store' method="post" id="contact_form">

                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            @if (Auth::check())
                                <input name="user_id" type="hidden" value={{ Auth::user()->id }}/>
                            @endif

                            <fieldset>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Objet</label>
                                    <input type="text" name="title" id="your-name" minlength="3"
                                           placeholder="Objet de votre demande" required value="{{ old('title') }}">
                                    @if ($errors->has('title'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Prénom</label>
                                    <input type="text" name="name" id="your-name" minlength="3"
                                           placeholder="Votre Prénom" required value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Nom</label>
                                    <input type="text" name="last_name" id="your-name" minlength="3"
                                           placeholder="Votre nom" required value="{{ old('last_name') }}">
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Number</label>
                                    <input type="text" name="number" id="your-name" minlength="3"
                                           placeholder="Votre téléphone" required
                                           value="{{ old('number') }}">
                                    @if ($errors->has('number'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('number') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">Email</label>
                                    <input type="email" name="email" id="email"
                                           placeholder="Votre email" required
                                           value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                                    <label for="email"
                                           class="col-md-4 control-label">Contenu</label>
                                    <textarea name="content" id="your-message"
                                              placeholder="Votre demande"
                                              required {{ old('content') }}></textarea>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                                    @endif
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 colg">
                                            <button type="submit">
                                                <small>Envoyer</small>
                                            </button>
                                        </div>
                                        </label>

                                        <div class="col-md-6 cold">
                                            <a href="{{route("home")}}">
                                            <button>
                                                <small>Retour</small>
                                            </button>
                                            </a>
                                        </div>
                            </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




