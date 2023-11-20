<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Super Eats</title>

        <!--Bootstrap Styling-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        
    </head>


    <body>
        <div>
        <nav class="navbar navbar-expand-lg" style="background-color: #21A179">
            <div class="container">
                <a class="navbar-brand" href="{{route('restaurantList')}}" style="text-decoration: none; color: inherit;"><h1>Super Eats</h1></a>
                <ul class="navbar-nav ml-auto d-flex justify-content-between">
                    @if(Route::has('login'))
                        @auth

                        <li class='nav-item'>
                            <h3 class='text-white fs-6 nav-link'>Hi {{ Auth::user()->name }}&nbsp;(&nbsp;<u>{{ucfirst(Auth::user()->user_type)}}</u>&nbsp;)</h3>
                        </li>

                        <li class='nav-item'>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </li>

                        <li class='nav-item'>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <button class="nav-link text-white fs-6 text-right btn btn-plain"><h3>Logout</h3></button>
                            </form>
                        </li>

                        @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link text-white fs-6"><h3>Log in</h3></a>
                        </li>
                    

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link text-white fs-6"><h3>Register</h3></a>
                            </li>
                        @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
        </div>

        <div>
            @yield('content')
        </div>

    </body>
</html>
