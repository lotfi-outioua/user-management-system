<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>{{ env('APP_NAME') }}</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
            <div class="d-flex">
                @if (Route::has('login'))
                    <div class="py-4">
                        @auth
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); logout()" class="link-info">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="link-info">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="link-info">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </nav>

    @can('logged-in')
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">Users</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endcan


    <main class="container mt-3">
        @include('includes.alerts')
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script>
        function logout() {
            document.getElementById('logout-form').submit();
        }
    </script>

</body>
</html>
