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
       <meta name="csrf-token" content="{{ csrf_token() }}">
       <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
</head>
<body>
       <div id="app">
              <!-- vue js-->
              <script src="{{ asset('js/app.js') }}"> </script>
       </div>
</body>
</html>
    