<!DOCTYPE html>
<html>
    <head>
        @include('includes.admin.head')
    </head>
    <body class="skin-blue">
        <header class="header">
            @include('includes.admin.header')
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="left-side sidebar-offcanvas" style="min-height: 2014px;">
                @include('includes.admin.sidebar')
            </aside>

            <aside class="right-side">
                @yield('content')
            </aside>
        </div>

        <footer>
            @include('includes.admin.footer')
        </footer>
    </body>
</html>
