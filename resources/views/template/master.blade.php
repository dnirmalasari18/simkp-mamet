<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>simKP</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="https://www.its.ac.id/tmaterial/simkp/public/'template/material.png">
    @include('partials.css')
    @yield('additional-css')
    <link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/'template/assets/css/style.css">
    <link rel="stylesheet" href="https://www.its.ac.id/tmaterial/simkp/public/template/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    @include('template.sidebar')

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        @include('template.header')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><strong>@yield('page-title')</strong></h1>
                    </div>
                </div>
            </div>
            <!--<div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">UI Elements</a></li>
                            <li class="active">Tab</li>
                        </ol>
                    </div>
                </div>
            </div>-->
        </div>

        @yield('content')


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    @include('partials.js')
    @include('sweetalert::alert')
    @yield('additional-js')
</body>

</html>
