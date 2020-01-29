<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @if(globalSetting('new_year'))
    <link href="{{ asset('css/new_year.css') }}" rel="stylesheet">
    <script src="{{ asset('js/new_year.js') }}" defer></script>
    @endif
</head>
<body>
    <div id="app" class="d-flex flex-column" v-cloak>
        @php
        $navigation = buildNavigation();
        @endphp
        <div class="content">
            <nav class="d-none d-lg-block">
                <div class="nav_main">
                    <div class="container">
                        <div class="content_rating_system">
                            18+
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <a href="{{ url('/') }}" class="nav_logo">
                                    СКАЙНЕТ.РУ
                                    <br>
                                    (SKNT.RU)
                                </a>
                            </div>
                            <div class="col-lg-10 pl-0">
                                <div class="d-flex align-items-center">
                                    <div class="row align-items-center no-gutters">
                                        @foreach($navigation as $tree)
                                        <div class="col-auto">
                                            <a class="nav_item @if(strpos(request()->path(), $tree->section->url) > -1)active @endif" href="{{ url($tree->section->url) }}">
                                                {{ $tree->section->title }}
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="ml-auto">
                                        <div class="row align-items-center">
                                            <div class="col-auto nav_item">
                                                <i class="fas fa-phone-alt"></i>
                                                {{ env('PHONE') }}
                                            </div>
                                            <div class="col-auto nav_item profile">
                                                <a href="#">
                                                    Личный кабинет
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="subnav">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-2">
                                <img class="logo_img" src="{{ globalSetting('logo') }}" alt="{{ config('app.name', 'Laravel') }}">
                            </div>
                            <div class="col-lg-10 subnav_items">
                                @foreach($navigation as $tree)
                                <div class="row justify-content-between" @if(strpos(request()->path(), $tree->section->url) === false)hidden @endif>
                                    @foreach($tree->childrenTrees as $item)
                                        <div class="col-auto tree_item">
                                            <a href="{{ url($item->url) }}">
                                                <div class="">
                                                    <img src="{{ $item->section->getFirstMediaUrl('tree_icon') }}" alt="">
                                                </div>
                                                {{ $item->section->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            @include('front.trees.tree', [
                'tree' => currenCategory()
            ])
            <main class="py-4">
                @yield('banner')
                <div class="container">
                    @yield('content')
                </div>
            </main>

        </div>
        <canvas id="snow_canvas"></canvas>
        <footer class="bg-dark py-3 mt-auto">
            <div class="container">
                <div class="row">
                    @foreach($navigation as $tree)
                    <div class="col-auto px-5 d-none d-lg-block">
                        <div>
                            <a href="{{ url($tree->section->url) }}" class="font-weight-bold">{{ $tree->section->title }}</a>
                        </div>
                        @foreach($tree->childrenTrees as $item)
                        <div class="">
                            <a href="{{ url($item->url) }}">{{ $item->section->title }}</a>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="col">
                        <div class="row justify-content-between no-gutters">
                            @foreach(socialNetworks() as $item)
                            <a href="{{ $item->link }}" class="col-auto" target="_blank">
                                <img class="social_network_icon" src="{{ $item->getFirstMediaUrl('icon') }}" alt="">
                            </a>
                            @endforeach
                        </div>
                        <div class="license pt-3">
                            <p>
                                &copy; Разработка и поддержка сайта - SkyNet, 2019
                            </p>
                            <p>
                                Лицензия №167294 "Телематические услуги связи" от 18.08.18
                            </p>
                            <p>
                                Свидетельство о регистрации средства массовой информации Эл №ФС77-56599 от 26 декабря 2013г. Зарегистрирован в Федеральной службе по надзору в сфере связи, информационных технологий и массовых коммуникаций. Статьи
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- @include('front.components.mobile_menu') -->
    </div>
</body>
</html>
