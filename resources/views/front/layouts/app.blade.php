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
        <div class="content">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @foreach(buildNavigation() as $tree)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url($tree->section->url) }}">{{ $tree->section->title }}</a>
                            </li>
                            @endforeach
                        </ul>

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ env('PHONE') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="navigation__container">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <div class="">
                            <img class="logo_img" src="{{ globalSetting('logo') }}" alt="{{ config('app.name', 'Laravel') }}">
                        </div>
                        <div class="navigation__container__menu">
                            @foreach(buildNavigation() as $tree)
                            <div class="row" @if(strpos(request()->path(), $tree->section->url) === false)hidden @endif>
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
                    @foreach(buildNavigation() as $tree)
                    <div class="col-auto px-5">
                        <div>
                            <a href="{{ url($tree->section->url) }}" class="font-weight-bold text-white">{{ $tree->section->title }}</a>
                        </div>
                        @foreach($tree->childrenTrees as $item)
                        <div class="">
                            <a href="{{ url($item->url) }}" class="text-white">{{ $item->section->title }}</a>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <div class="col d-flex justify-content-between flex-nowrap">
                        @foreach(socialNetworks() as $item)
                        <a href="{{ $item->link }}" target="_blank">
                            <img class="social_network_icon" src="{{ $item->getFirstMediaUrl('icon') }}" alt="">
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
