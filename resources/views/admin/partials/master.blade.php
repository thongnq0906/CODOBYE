<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
    {{--     <link href="{{ asset('plugins/iCheck/flat/blue.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/morris/morris.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/datepicker/datepicker3.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/switchery.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css">
    <link href="{{ asset('sitemapstyler/sitemapstyler.css') }}" rel="stylesheet" type="text/css" media="screen" />
</head>
<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        @include('admin.partials.header')
        @include('admin.partials.sidebar')
        @yield('content')
        @include('admin.partials.footer')
        <div class="control-sidebar-bg"></div>
    </div>
    <script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    {{-- <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('dist/js/app.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('dist/js/demo.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/adminjs.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('ckfinder/ckfinder.js') }}"></script> --}}
    {{-- <script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/decoupled-document/ckeditor.js"></script> --}}
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script> --}}
    <script type="text/javascript" src="{{ asset('sitemapstyler/sitemapstyler.js') }}"></script>
    @yield('script')
  </body>
</html>
