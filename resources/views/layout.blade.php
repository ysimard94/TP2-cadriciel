<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" crossorigin="anonymous"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>

</head>

<body>
    @php $locale = session()->get('locale'); @endphp
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div>
            <a class="navbar-brand ms-3" href="{{ route('student.index') }}">Maisonneuve 2194679</a>
        </div>
        <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('student.index') }}">@lang('lang.student_list')</a>
                <a class="nav-item nav-link border-start border-2"
                    href="{{ route('city.index') }}">@lang('lang.cities')</a>
                @guest
                    <a class="nav-item nav-link border-start border-2" href="{{ route('login') }}">@lang('lang.login')</a>
                    <a class="nav-item nav-link border-start border-2"
                        href="{{ route('user.register') }}">@lang('lang.sign_up')</a>
                @else
                    <a class="nav-item nav-link border-start border-2"
                        href="{{ route('student.create') }}">@lang('lang.create_student')</a>
                    <a class="nav-item nav-link border-start border-2" href="{{ route('forum') }}">Forum</a>
                    <a class="nav-item nav-link border-start border-2"
                        href="{{ route('file.index') }}">@lang('lang.files')</a>
                    <a class="nav-item nav-link border-start border-2"
                        href="{{ route('user.logout') }}">@lang('lang.logout')</a>
                @endguest
            </div>
        </div>
        <div class="btn-group btn-group-toggle">
            <a class="btn btn-outline-secondary @if ($locale == 'en') active @endif"
                href="{{ route('lang', 'en') }}">English</a>
            <a class="btn btn-outline-secondary mr-2 @if ($locale == 'fr') active @endif"
                href="{{ route('lang', 'fr') }}">Français</a>
        </div>
    </nav>
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
</script>

</html>
