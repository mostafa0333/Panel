{{-- Pterodactyl - Panel --}}
{{-- Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com> --}}

{{-- This software is licensed under the terms of the MIT license. --}}
{{-- https://opensource.org/licenses/MIT --}}
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name', 'Pterodactyl') }} - @yield('title')</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/favicons/manifest.json">
        <link rel="mask-icon" href="/favicons/safari-pinned-tab.svg" color="#bc6e3c">
        <link rel="shortcut icon" href="/favicons/favicon.ico">
        <meta name="msapplication-config" content="/favicons/browserconfig.xml">
        <meta name="theme-color" content="#367fa9">
        <script src="/js/lang/{{ config('app.locale') }}.js"></script>

        @section('scripts')
            {!! Theme::css('vendor/bootstrap/bootstrap.min.css') !!}
            {!! Theme::css('vendor/adminlte/admin.min.css') !!}
            {!! Theme::css('css/pterodactyl.css') !!}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        @show
    </head>
    <body id="particles-js" class="hold-transition login-page">
        <div class="container">
            <div id="login-position-elements">
                <div class="login-logo">
                    <img src="https://www.oyunhost.net/ohn-admin-login-logo.png" border="0" title="{{ config('app.name', 'Pterodactyl') }} - sunucu paneli">
                </div>
                @yield('content')
                <p class="small login-copyright text-center">
                    <a href="https://www.oyunhost.net/" target="_blank">oyunhost.net</a> &copy; 2017 - {{ date('Y') }}<br />
                </p>
            </div>
        </div>
        <div class="login-corner-info small">
            <strong><i class="fa fa-fw {{ $appIsGit ? 'fa-git-square' : 'fa-code-fork' }}"></i></strong> {{ $appVersion }}<br />
            <strong><i class="fa fa-fw fa-clock-o"></i></strong> {{ round(microtime(true) - LARAVEL_START, 3) }}s
        </div>

        {!! Theme::js('vendor/jquery/jquery.min.js') !!}
        {!! Theme::js('vendor/bootstrap/bootstrap.min.js') !!}
        {!! Theme::js('js/autocomplete.js') !!}
        {!! Theme::js('vendor/particlesjs/particles.min.js') !!}
        <script type="text/javascript">
            /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
            $(function () {
                particlesJS.load('particles-js', '{!! Theme::url('vendor/particlesjs/particles.json') !!}', function() {});
            })
        </script>

        @if(config('pterodactyl.lang.in_context')) {!! Theme::js('vendor/phraseapp/phraseapp.js') !!} @endif
    </body>
</html>
