<!DOCTYPE html>
<html>
    <head>
        @include('includes.agent.head')
    </head>
    <body class="skin-blue">
        @include('includes.agent.header')
        <div class="wrapper row-offcanvas row-offcanvas-left">

            @if (Auth ::id() && (Auth ::user()->role_id == '2'))
            <aside class="left-side sidebar-offcanvas" style="min-height: 2014px;">
                @include('includes.agent.sidebar')
            </aside>
            @endif
            <aside class="right-side">
                @yield('content')
            </aside>
        </div>

        <footer>
            @include('includes.agent.footer')
        </footer>
    </body>
</html>