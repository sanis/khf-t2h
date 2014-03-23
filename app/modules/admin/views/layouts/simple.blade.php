<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $page_title }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Just a page for admins">
    <meta name="author" content="Justinas Bolys">

    <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all"> -->
    <link rel="stylesheet" href="{{ asset($assetDir.'css/styles.min.css') }}">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="{{ asset($assetDir.'js/less.js') }}"></script>
</head><body class="focusedform">

<div class="verticalcenter">
    <a href="{{ URL::route('admin.dashboard') }}"><img src="{{ asset($assetDir.'img/logo-big.png') }}" alt="Logo" class="brand" /></a>
    @yield('content')
</div>

</body>
</html>