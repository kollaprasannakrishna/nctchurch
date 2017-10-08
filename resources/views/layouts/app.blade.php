<!DOCTYPE html>
<html lang="en">
<head>
    @include('controlPanel.partials._header')
    @yield('styles')
</head>
<body class="grad-back">

    @if (Auth::guest())
        @include('controlPanel.partials._welcome_nav')
        @else
        @include('controlPanel.partials._nav')

    @endif

    @if (Auth::guest())
        @yield('content')
        @else
        <main>
            @yield('content')
        </main>
    @endif

    @include('controlPanel.partials.message')
    @include('controlPanel.partials.scripts')
        @yield('scripts')
</body>
</html>
