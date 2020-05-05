<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Listado de usuarios</title>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="m-b-md">
            <b>Actividades</b>
        </div>

        {{-- <div class="flex-center position-ref full-height"> --}}
        <div class="content">
            <div class="form_add_activities flex-center">
                <table>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Aforo</th>
                        <th>Duración</th>
                        <th>Precio</th>
                        <th>Fecha</th> 
                        <th>Empresa</th> 
                        <th></th>
                    </tr>
                        <tr>
                            <td>
                                @if($activity->image !== null)
                                    <img src="{{ asset('img/'.$activity->image) }}" width="100" height="100" >
                                @else
                                    <p>Sin imagen</p>
                                @endif
                            </td>
                            <td>{{ $activity->name }}</td>                          
                            <td>{{ $activity->type }}</td>
                            <td>{{ $activity->capacity }}</td>
                            <td>{{ $activity->duration }}</td>
                            <td>{{ $activity->price }}</td>
                            <td>{{ $activity->start }}</td>
                            <td>{{ $activity->companyid }}</td>
                        </tr>
                </table>
            </div>
        </div>
        <footer>
            <p class="footer"><b>Vive tu Gran Canaria &copy; 2020<b></p>
        </footer>
    </body>
</html>
