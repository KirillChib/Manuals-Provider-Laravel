<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body>
    @section('menu')
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
            <ul class="navbar-nav">
                <li class="nav-item"> <a class="nav-link" href="{{ url('manual') }}">Main page</a></li>
                @if(Auth::check())
                <li class="nav-item"> <a class="nav-link" href="{{ url('manual/create') }}">Add Manual</a> </li>
                <li class="nav-item"><p class="nav-link"> Welcome, {{ Auth::user()->name }}</p> </li>
                @else
                <li class="nav-item"> <a class="nav-link" href="{{ route('login') }} ">Login</a> </li>
                @endif
                @auth
                <li class="nav-item"> 
                    {!! Form::open(['route'=> 'logout']) !!}
                    @csrf
                    {!! Form::button('Logout', ['type'=>'submit', 'class'=>'nav-link']) !!}
                    {!! Form::close() !!}
                </li>    
                @endauth
            </ul>
        </nav>
    @show
    <div class="container">
        @yield('content')
    </div>
</body>
</html>