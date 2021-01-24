<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} - Admin </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('js')

    <!-- Fonts -->

    <!-- Fav Icon -->

    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layouts/admin.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="page">
            <div class="sidebar">
                <div class="elements">
                    <div class="logo">
                        <p><a href="{{route('home')}}">{{ config('app.name') }} </a><span>CRM</span></p>
                    </div>
                    <ul class="element">
                        <li><a href="{{route('adminHome')}}"><i class="lni lni-dashboard"></i> Dashboard</a></li>
                    </ul>
                    <p class="title">ZARZĄDZANIE</p>
                    <ul class="element">
                        <li class="{{ set_active('admin/aktualnosci') }}"><a href="{{route('adminPost')}}"><i class="lni lni-popup"></i> Aktualności</a></li>
                        <li class="{{ set_active('admin/blog') }}"><a href="{{route('adminBlog')}}"><i class="lni lni-world"></i> Blog</a></li>
                        <li class="{{ set_active('admin/specjalisci') }}"><a href="{{route('adminSpecialist')}}"><i class="lni lni-pulse"></i> Specjaliści</a></li>
                        <li class="{{ set_active('admin/uslugi') }}"><a href="{{route('adminService')}}"><i class="lni lni-first-aid"></i> Usługi</a></li>
                    </ul>
                    <p class="title">DANE</p>
                    <ul class="element">
                        <li class="{{ set_active('admin/tagi') }}"><a href="{{route('adminTag')}}"><i class="lni lni-tag"></i> Tagi</a></li>
{{--                        <li class="{{ set_active('admin/partnerzy') }}"><a href="{{route('adminPartner')}}"><i class="lni lni-handshake"></i> Partnerzy</a></li>--}}
                        <li class="{{ set_active('admin/info') }}"><a href="{{route('adminInfo')}}"><i class="lni lni-timer"></i> Dane kontaktowe </a></li>
                    </ul>
                    <p class="title">INNE</p>
                    <ul class="element">
{{--                        <li><a href=""><i class="lni lni-rocket"></i> Analityka</a></li>--}}
{{--                        <li><a href=""><i class="lni lni-home"></i> Strona główna</a></li>--}}
                        <li class="{{ set_active('admin/pliki') }}"><a href="{{route('adminFiles')}}"><i class="lni lni-add-files"></i> Pliki</a></li>
{{--                        <li><a href=""><i class="lni lni-envelope"></i> Poczta</a></li>--}}
                    </ul>
                </div>

            </div>
            <div class="main">
                <div class="header">
                    <div class="actions">
                        <img src="{{url('/images/avatar-person.svg')}}" alt="Image"/>
                        <p  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$user->name}} <i class="lni lni-chevron-down"></i></p>


                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Ustawienia</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Wyloguj się') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
        </div>



    </div>
</body>
</html>
