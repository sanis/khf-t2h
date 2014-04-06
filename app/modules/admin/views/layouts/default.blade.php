<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>{{{ $page_title }}}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Justinas Bolys">

    <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all">  -->
    <link rel="stylesheet" href="{{ asset($assetDir.'css/styles.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='{{ asset($assetDir.'demo/variations/sidebar-green.css') }}' rel='stylesheet' type='text/css' media='all' id='styleswitcher'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries. Placeholdr.js enables the placeholder attribute -->
    <!--[if lt IE 9]>
    <link rel="stylesheet" href="{{ asset($assetDir.'css/ie8.css') }}">
    <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
    <script type="text/javascript" src="{{ asset($assetDir.'plugins/charts-flot/excanvas.min.js') }}"></script>
    <![endif]-->

    <!-- The following CSS are included as plugins and can be removed if unused-->

    <link rel='stylesheet' type='text/css' href='{{ asset($assetDir.'plugins/codeprettifier/prettify.css') }}' />
    <link rel='stylesheet' type='text/css' href='{{ asset($assetDir.'plugins/form-toggle/toggles.css') }}' />
    <link rel="stylesheet" type="text/css" href='{{ asset($assetDir.'plugins/datatables/dataTables.css') }}' />
    <link rel='stylesheet' type='text/css' href='{{ asset($assetDir.'plugins/form-nestable/jquery.nestable.css') }}' />

    <!-- <script type="text/javascript" src="assets/js/less.js"></script> -->
</head>

@include('admin::layouts.default.headerbar')

@include('admin::layouts.default.header')

<div id="page-container">
    <!-- BEGIN SIDEBAR -->
    <nav id="page-leftbar" role="navigation">
        @include('admin::layouts.default.leftbar')
    </nav>

    <!-- BEGIN RIGHTBAR -->
    <div id="page-rightbar">
        @include('admin::layouts.default.rightbar')
    </div>
    <!-- END RIGHTBAR -->
    <div id="page-content">
        <div id='wrap'>
            @yield('content')
        </div> <!--wrap -->
    </div> <!-- page-content -->

    @include('admin::layouts.default.footer')

</div> <!-- page-container -->

<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>!window.jQuery && document.write(unescape('%3Cscript src="assets/js/jquery-1.10.2.min.js"%3E%3C/script%3E'))</script>
<script type="text/javascript">!window.jQuery.ui && document.write(unescape('%3Cscript src="assets/js/jqueryui-1.10.3.min.js'))</script>
-->

<script type='text/javascript' src='{{ asset($assetDir.'js/jquery-1.10.2.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/jqueryui-1.10.3.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/bootstrap.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/enquire.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/jquery.cookie.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/jquery.nicescroll.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/codeprettifier/prettify.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/easypiechart/jquery.easypiechart.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/sparklines/jquery.sparklines.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/form-nestable/jquery.nestable.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/form-nestable/app.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'demo/demo-nestable.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/form-toggle/toggle.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/datatables/jquery.dataTables.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/datatables/dataTables.bootstrap.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'demo/demo-datatables.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'plugins/form-parsley/parsley.min.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'demo/demo-formvalidation.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/placeholdr.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'js/application.js') }}'></script>
<script type='text/javascript' src='{{ asset($assetDir.'demo/demo.js') }}'></script>
