<!DOCTYPE html>
<html lang="en" dir="ltr">
    <!-- START head -->
    @include('includes.head')
    <!-- END head -->

    <!-- START body -->
    <body>
        <!-- START header -->
            @include('includes.header')
        <!-- END header -->

            @yield('sliders_content', '')

        <!-- START .main-contents -->
            @yield('content')
        <!-- END .main-contents -->

        <!-- START footer -->
             @include('includes.footer')
        <!-- END footer -->
    </body>
</html>