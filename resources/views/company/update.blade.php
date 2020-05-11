<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Update page</title>
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

        <div class="content">
            <form action="{{ url(route('update', $details->id)) }}" method="POST" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <table>
                    <tr>
                        <td><label for="name">Nombre</label></td>
                        <td><input name="name" type="text" value="{{ old('name')??$details->name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Descripción</label></td>
                        <td><input name="description" type="text" value="{{ old('description')??$details->description }}"></td>
                    </tr>
                    <tr>
                        <td><label for="contact">Contacto</label></td>
                        <td><input name="contact" type="text" value="{{ old('contact')??$details->contact }}"></td>
                    </tr>
                    <tr>
                        <td><label for="image">Logo</label></td>
                        <td><input type="file" name="image"></td>
                    </tr>  
                    <tr>
                        <td>
                            <input type="submit" name="update-user" value="Actualizar">
                        </td>
                    </tr>     
                </table>
            </form>
        </div>
    </body>
</html>