<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/app.css">
</head>
<body>

    <div>
        <nav class="navbar navbar-expand-lg bg-secondary">
            <div class="container-fluid">
              <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand text-light" href="#">Job Portal</a>
                @if(Auth::check())
                    <form action="{{ route('logout') }}" class="ms-auto d-flex" method="post">
                        @csrf
                        <a  class="text-light me-3"href="{{ route('profile')}}">{{ Auth::user()->name }}</a>
                        <button class="btn btn-sm btn-danger">Logout</button>
                    </form>
                @else
                    <div class="ms-auto">
                        <a class="navbar-brand text-light" href="{{ route('login') }}">Sign In</a>
                        <a class="navbar-brand text-light" href="{{ route('register') }}">Sign Up</a>
                    </div>
                @endif
              </div>
            </div>
          </nav>
    </div>
    
    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>