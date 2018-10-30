<!doctype html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>@yield('metaTitle')</title>
    <meta name='description' content='@yield('metaDescription')'>
    <style>
        {!! file_get_contents(public_path('css/web.min.css')) !!}
    </style>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
<body>
    <div class="container-fluid">
        <div class='row'>
            <div class='col-2'>
               <!-- include left sidebar -->
            </div>
            <div class="col-8">
                @yield('content')
            </div>
            <div class='col-2'>
                 <!-- include right sidebar -->
            </div>
        </div>
    </div>
    @yield('footer') 
</body>
</html>
    