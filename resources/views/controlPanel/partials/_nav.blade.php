

<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="userView">
            <div class="background">
                <img src="http://www.crazytdesigns.co.za/wp-content/uploads/2016/04/design-header.jpg" class="responsive-img">
            </div>
            <a href="#!user"><img class="circle" src="https://lh3.googleusercontent.com/xBtprGNIVL9FLenph3-R2BlMz6k8OhOYGuoJ3An7MAE1txcRtcLUY62FoqORQY2Tjw=w300"></a>

            <div class="">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <a href="#!name" class="collapsible-header"><span class="white-text name">{{Auth::user()->name}} <i class="material-icons">arrow_drop_down</i></span></a>
                        <div class="collapsible-body c-ul-div">
                            <ul>
                                <li><a href="#!">Settings <i class="material-icons">&#xE8B8;</i></a></li>
                                <li><a href="#!">Profile<i class="material-icons">&#xE853;</i></a></li>
                                <li><a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout<i class="material-icons">&#xE879;</i>
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                  </li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div>

        </div>

    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Blog<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{route('posts.create')}}">Create Post</a></li>
                        <li><a href="{{route('posts.index')}}">Show All Post</a></li>
                        <li><a href="{{route('categories.create')}}">Create Categories</a></li>
                        <li><a href="{{route('tags.create')}}">Create Tags</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Events<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{ route('events.create') }}">Create Event</a></li>
                        <li><a href="{{ route('events.index') }}">All Events</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Sermons<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{ route('sermons.create') }}">Create Sermon</a></li>
                        <li><a href="{{ route('sermons.index') }}">Show all Sermons</a></li>
                        <li><a href="{{ route('series.create') }}">Series</a></li>
                        <li><a href="#!">Create Sermon Tags</a></li>


                    </ul>
                </div>
            </li>
        </ul>
    </li>


    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Emails<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{route('emails.create')}}">Creat Emails</a></li>
                        <li><a href="{{route('emails.index')}}">All Emails</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Members<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{ route('members.create') }}">Member Signup</a></li>
                        <li><a href="{{ route('members.index') }}">All Member</a></li>
                        <li><a href="{{ route('positions.create') }}">Create Position</a></li>
                        <li><a href="{{ route('groups.create') }}">Create Groups</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </li>
    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Settings<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>

                        <li><a href="{{ route('venue.create') }}">Address & Contact</a></li>
                        <li><a href="{{route('admin.index')}}">Admin</a></li>

                    </ul>
                </div>
            </li>
        </ul>
    </li>


    <li class="center"><a href="{{ url('/logout') }}"
                          onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form></li>
</ul>

<main>
    <div class="navbar-fixed">

        <nav class="nav-extended">
            <div class="nav-wrapper grad-back">
                <a href="#" class="brand-logo add-left-10">@yield('header')</a>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>


            </div>




        </nav>
    </div>
</main>

{{--<nav class="navbar navbar-default navbar-static-top">--}}
    {{--<div class="container">--}}

        {{--<!-- Brand and toggle get grouped for better mobile display -->--}}
        {{--<div class="navbar-header">--}}
            {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
                {{--<span class="sr-only">Toggle navigation</span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
                {{--<span class="icon-bar"></span>--}}
            {{--</button>--}}
            {{--<a class="navbar-brand" href="#">Web Panel</a>--}}
        {{--</div>--}}



        {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}

            {{--<!-- Right Side Of Navbar -->--}}
            {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<!-- Authentication Links -->--}}
                {{--@if (Auth::guest())--}}
                    {{--<li><a href="{{ url('/login') }}">Login</a></li>--}}
                    {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                {{--@else--}}
                    {{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blog <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{route('posts.create')}}">Create Post</a></li>--}}
                            {{--<li><a href="{{route('posts.index')}}">Show All Post</a></li>--}}
                            {{--<li><a href="{{route('categories.create')}}">Create Categories</a></li>--}}
                            {{--<li><a href="{{route('tags.create')}}">Create Tags</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Events<span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ route('events.create') }}">Create Event</a></li>--}}
                            {{--<li><a href="{{ route('events.index') }}">All Events</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Messages <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ route('sermons.create') }}">Create Sermon</a></li>--}}
                            {{--<li><a href="{{ route('sermons.index') }}">Show all Sermons</a></li>--}}
                            {{--<li><a href="{{ route('series.create') }}">Series</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}

                    {{--<li><a href="{{ route('venue.create') }}">Address & Contact</a></li>--}}
                    {{--<li><a href="{{route('admin.index')}}">Admin</a></li>--}}
                    {{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Emails <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{route('emails.create')}}">Creat Emails</a></li>--}}
                            {{--<li><a href="{{route('emails.index')}}">All Emails</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Members <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ route('members.create') }}">Member Signup</a></li>--}}
                            {{--<li><a href="{{ route('members.index') }}">All Member</a></li>--}}
                            {{--<li><a href="{{ route('positions.create') }}">Create Position</a></li>--}}
                            {{--<li><a href="{{ route('groups.create') }}">Create Groups</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                        {{--</a>--}}

                        {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li>--}}
                                {{--<a href="{{ url('/logout') }}"--}}
                                   {{--onclick="event.preventDefault();--}}
                                                     {{--document.getElementById('logout-form').submit();">--}}
                                    {{--Logout--}}
                                {{--</a>--}}

                                {{--<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">--}}
                                    {{--{{ csrf_field() }}--}}
                                {{--</form>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</nav>--}}
