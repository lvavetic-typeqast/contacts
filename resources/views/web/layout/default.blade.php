<!doctype html>
<html lang='en'>
<head>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/black/pace-theme-minimal.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
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
    