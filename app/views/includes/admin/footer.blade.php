<!-- jQuery 2.0.2 -->
{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') }}
<!-- Bootstrap -->
{{ HTML::script('packages/admin/assets/js/bootstrap.min.js') }}
<!-- AdminLTE App -->
{{ HTML::script('packages/admin/assets/js/AdminLTE/app.js') }}
<script type='text/javascript' src="{{ asset('packages/js/common.js') }}"></script>
@yield('page-script')


