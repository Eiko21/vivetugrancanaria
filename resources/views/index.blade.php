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
                        <th>Precio</th>
                        <th>Fecha</th>  
                        <th></th>
                    </tr>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>
                                @if($activity->image !== null)
                                    <img src="{{ asset('img/'.$activity->image) }}" width="100" height="100" >
                                @else
                                    <p>Sin imagen</p>
                                @endif
                            </td>
                            <td><a href="{{action('ActivityController@show', ['id' => $activity->id])}}">{{$activity->name}}</a></td>                          
                            <td>{{ $activity->price }}</td>
                            <td>{{ $activity->start }}</td>
                        </tr>
                    @endforeach 
                </table>
            </div>
        </div>
        <footer>
            <p class="footer"><b>Vive tu Gran Canaria &copy; 2020<b></p>
        </footer>
    </body>
</html>
