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
                            @foreach(App\Models\Navigation::buildHeader() as $value)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url($value->url) }}">{{ $value->title }}</a>
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
                            <img src="{{ globalSetting('logo') }}" alt="{{ config('app.name', 'Laravel') }}">
                        </div>
                        <div class="navigation__container__menu">
                            @foreach(App\Models\Navigation::buildHeader() as $key => $value)
                            <div class="row" @if(strpos(request()->path(), $value->url) === false)hidden @endif>
                                @foreach($value->children as $child)
                                <div class="col-auto">
                                    <a class="py-3" href="{{ url($child->pivot->url) }}">{{ $child->title }}</a>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @include('front.navigations.children', [
                'children' => App\Models\Navigation::buildChildren()
            ])
            <main class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>
        <canvas id="snow_canvas"></canvas>
        <footer class="bg-dark py-3 mt-auto">
            <div class="container">
                <div class="row">
                    @foreach(App\Models\Navigation::buildHeader() as $value)
                    <div class="col">
                        <div>
                            <a href="{{ url($value->url) }}" class="font-weight-bold text-white">{{ $value->title }}</a>
                        </div>
                        @foreach($value->children as $child)
                        <div class="">
                            <a href="{{ url($child->url) }}" class="text-white">{{ $child->title }}</a>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>

            </div>
        </footer>
    </div>
</body>
</html>
