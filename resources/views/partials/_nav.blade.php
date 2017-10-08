<header>
    {{--@include('partials._head')--}}

    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="" width="199" height="52" /></a>
            </div>
            <div class="navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>

                    <li><a href="{{route('blog')}}">Events</a></li>
                    <li><a href="{{route('blog')}}">Blog</a></li>

                    <li><a href="{{route('contact')}}">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- end header -->

{{--<li class="dropdown">--}}
{{--<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Features <i class="fa fa-angle-down"></i></a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="typography.html">Typography</a></li>--}}
{{--<li><a href="components.html">Components</a></li>--}}
{{--<li><a href="pricing-box.html">Pricing box</a></li>--}}
{{--<li class="dropdown-submenu">--}}
{{--<a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown">Pages</a>--}}
{{--<ul class="dropdown-menu">--}}
{{--<li><a href="fullwidth.html">Full width</a></li>--}}
{{--<li><a href="right-sidebar.html">Right sidebar</a></li>--}}
{{--<li><a href="left-sidebar.html">Left sidebar</a></li>--}}
{{--<li><a href="comingsoon.html">Coming soon</a></li>--}}
{{--<li><a href="search-result.html">Search result</a></li>--}}
{{--<li><a href="404.html">404</a></li>--}}
{{--<li><a href="register.html">Register</a></li>--}}
{{--<li><a href="login.html">Login</a></li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}