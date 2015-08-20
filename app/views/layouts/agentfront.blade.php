<!DOCTYPE html>
<!-- saved from url=(0042)http://getbootstrap.com/examples/carousel/ -->
<html lang="en">
    <!-- START head -->
    @include('includes.agentfront.head')
    <!-- END head -->

    <!-- START body -->
    <body>
        <!-- START header -->
        @include('includes.agentfront.header')
        <!-- END header -->

        @yield('sliders_content', '')

        <!-- START .main-contents -->
        @yield('content')
        <!-- END .main-contents -->

        <!-- START footer -->
        @include('includes.agentfront.footer')
        <!-- END footer -->
    </body>
</html>

