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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
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
        <div class="wrapper-footer">
            <hr class='bg-secondary my-4'>

            @include('web.includes.footer.copyright')
        </div>
    </footer>

</body>
</html>
    