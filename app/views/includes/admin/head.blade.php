<meta charset="UTF-8">
<title>Bunny's</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<!-- Bootstrap.css -->
{{ HTML::style('packages/admin/assets/css/bootstrap.min.css') }}
<!-- font Awesome -->
{{ HTML::style('packages/admin/assets/css/font-awesome.min.css') }}
<!-- Ionicons -->
{{ HTML::style('packages/admin/assets/css/ionicons.min.css') }}
<!-- Theme style -->
{{ HTML::style('packages/admin/assets/css/AdminLTE.css') }}

@yield('page-style')
<script type="text/javascript">
    var BASE_URL = '{{ url("/") }}';
</script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
