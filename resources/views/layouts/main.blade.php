<!DOCTYPE html>
<html lang="en">
<head>
    @include('stylesAndJs.header')
    @yield('styles')
</head>
<body>

<div class="box">
    @include('partials._nav')
    @yield('carousel')

    @yield('content')

</div>


    @include('partials._footer')


    @include('stylesAndJs.footer')
    @yield('scripts')
</body>
</html>
