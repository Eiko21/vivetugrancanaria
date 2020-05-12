<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <table id="listado">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Ciudad</th>
                    <th>Foto</th>
                    

                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td><b>{{ $user->name }}</b></td>
                        <td><b>{{ $user->email }}</b></td>
                        <td><b>{{ $user->role }}</b></td>
                        <td><b>{{ $user->city}}</b></td>
                        <td>
                            @if($user->image !== null)
                                <img src="{{ asset('img/'.$user->image) }}" width="100" height="100" >
                            @else
                                <p><b><i>Sin foto</i></b></p>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>
            <div class="content">
                <div class="title m-b-md">
                    ViveTuGranCanaria
                </div>
            </div>
        </div>
    </body>
</html>
