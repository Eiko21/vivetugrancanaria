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
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Capacidad</th>
                        <th>Fecha</th>
                        <th>Duracion</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                    @foreach ($activities as $activities)
                        <tr>
                            <td>{{ $activities->name }}</td>
                            <td>{{ $activities->type }}</td>
                            <td>{{ $activities->description }}</td>
                            <td>{{ $activities->price }}</td>
                            <td>{{ $activities->capacity }}</td>
                            <td>{{ $activities->start }}</td>
                            <td>{{ $activities->duration }}</td>
                            <td>
                                @if($activities->image !== null)
                                    <img src="{{ asset('img/'.$activities->image) }}" width="100" height="100" >
                                @else
                                    <p>Sin foto</p>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    <script>
                        $(".delete").on("submit", function(){
                            return confirm("¿Está seguro de que desea eliminar esta actividad?");
                        });
                    </script>   
                </table>
            </div>
        </div>
        <footer>
            <p class="footer"><b>Vive tu Gran Canaria &copy; 2020<b></p>
        </footer>
    </body>
</html>
