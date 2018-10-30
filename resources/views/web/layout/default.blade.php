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
    <header class='hidden-print'>
        <div class='wrapper-header'>
            <div class='container-fluid'>
                <div class='header-logotip'>
                    @include('web.includes.header.logo')
                </div>

                <div class='header-navigation' id='menu-navigation'>
                    @include('web.includes.header.navigation')
                </div>

                <div class='clearfix'></div>
            </div>
        </div>
    </header>

    <div class='wrapper-content'>
        <div class=''>
            <!--include sidebar-->
        </div>

        <div class="container">
            @yield('content')
        </div>

        <div class='clearfix'></div>
    </div>


    <footer>
        @yield('footer')
    </footer>

</body>
</html>
    