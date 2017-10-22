<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed center-block visible-xs visible-sm" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    MENU
                </button>

                <!-- Branding Image -->
                <div class="container-logo">
                    <a class="" href="{{ url('/') }}"><img class="logo center-block" src="{{URL::asset('/logo/logo.jpg')}}" width="100px" height="55px"></a>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">


                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav hidden-sm">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li>
                            <a href="{{ route('user.index') }}">
                                Profil
                            </a>

                            <form id="form" action="{{ route('user.index') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if (Auth::user()->isRecruiter)
                        <li>
                            <a href="{{ route('finder.show') }}">
                                Finder CV
                            </a>

                            <form id="form" action="{{ route('finder.show') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @endif
                        <li>
                            <a href="{{ route('inboxe.index') }}">
                                Message
                            </a>

                            <form id="form" action="{{ route('inboxe.index') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="{{ route('contact.create') }}">
                                Contact
                            </a>

                            <form id="form" action="{{ route('contact.create') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    @if (Auth::user()->isAdmin)
                            <li>
                                <a href="{{ route('admin.index', 1) }}">
                                    Admin
                                </a>

                                <form id="form" action="{{ route('admin.index', 1) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>
<footer class="footer hidden-xs hidden-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="container-logo">
                    <a class="" href="{{ url('/') }}"><img class="logo center-block" src="{{URL::asset('/logo/logo.jpg')}}" width="100px" height="55px"></a>
                </div>
            </div>
            <div class="col-md-8 footer-links">
                <ul>
                    @if (Auth::guest())
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li>
                            <a href="{{ route('user.index') }}">
                                Profil
                            </a>

                            <form id="form" action="{{ route('user.index') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        @if (Auth::user()->isRecruiter)
                            <li>
                                <a href="{{ route('finder.show') }}">
                                    Finder CV
                                </a>

                                <form id="form" action="{{ route('finder.show') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('inboxe.index') }}">
                                Message
                            </a>

                            <form id="form" action="{{ route('inboxe.index') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li>
                            <a href="{{ route('contact.create') }}">
                                Contact
                            </a>

                            <form id="form" action="{{ route('contact.create') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                    @if (Auth::user()->isAdmin)
                            <li>
                                <a href="{{ route('admin.index', 1) }}">
                                    Admin
                                </a>

                                <form id="form" action="{{ route('admin.index', 1) }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row_credits">
            <div class="col-md-12">
                <h5 class="text-center credits">FINDER CV - ALL RIGHTS RESERVED</h5>
            </div>
        </div>
    </div>
</footer>
<div class="footer-mobile visible-xs visible-sm">
    <div class="container">
        <div class="col-md-12">
            <div class="container-logo">
                <a class="" href="{{ url('/') }}"><img class="logo center-block" src="{{URL::asset('/logo/logo.jpg')}}" width="100px" height="55px"></a>
            </div>
            <ul class="footer-mobile-links">
                @if (Auth::guest())
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    <li><a href="{{ route('contact.create') }}">Contact</a></li>
                @else
                    <li>
                        <a href="{{ route('user.index') }}">
                            Profil
                        </a>

                        <form id="form" action="{{ route('user.index') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @if (Auth::user()->isRecruiter)
                        <li>
                            <a href="{{ route('finder.show') }}">
                                Finder CV
                            </a>

                            <form id="form" action="{{ route('finder.show') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('inboxe.index') }}">
                            Message
                        </a>

                        <form id="form" action="{{ route('inboxe.index') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('contact.create') }}">
                            Contact
                        </a>

                        <form id="form" action="{{ route('contact.create') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                @if (Auth::user()->isAdmin)
                        <li>
                            <a href="{{ route('admin.index', 1) }}">
                                Admin
                            </a>

                            <form id="form" action="{{ route('admin.index', 1) }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row_credits">
            <div class="col-md-12">
                <h5 class="text-center credits">FINDER CV - ALL RIGHTS RESERVED</h5>
            </div>
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>
