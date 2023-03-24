
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- >Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Style -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Title -->
        <title>{{ $title }}</title>
    </head>
    <body>
        <div class="container-fluid vh-100">
            <div class="row h-100 overflow-auto">
                <div class="col-2 p-0">
                    @include('layouts.nav')
                </div>
                <div class="col my-bg h-100 overflow-auto">
                    @yield('content')
                </div>
        
            </div>
        </div>
        
    </body>
</html>
