<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actividades</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
    </head>
    <body>
         
        <div class="m-b-md">
            <b>Actividades</b>
        </div>
              
          
        <div>
            <div id="list-title" style="margin-left:650px; color:#008CBA; font-size:40px"><h2>Listado de actividades</h2></div>
        </div>
        <form style="margin-bottom: 30px; padding-left: 5.5%; align:center" action="{{  url(route('create', $companyid))  }}" method="GET">
                @csrf
                <input style="margin-left:750px; background-color:#CBEDFF;color:black;" type="submit" name="create-activity" value="Añadir actividad">
            </form>
         @if($activities->isEmpty())
            <h3>Oh Oh! Aún no tienes actividades Puedes añadirla en el botón 'Añadir actividad'</h3> 
         @else        
        <div class="content">
            <div class="form_add_user flex-center">
                <table id="listado">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Aforo</th>
                        <th>Fecha</th>
                        <th>Duración</th>
                        <th>Imagen</th>
                        <th></th>

                    </tr>
                    @foreach ($activities as $activity)
                        <tr>
                            <td><b>{{ $activity->name }}</b></td>
                            <td><b>{{ $activity->type }}</b></td>
                            <td><b>{{ $activity->description }}</b></td>
                            <td><b>{{ $activity->price }}</b></td>
                            <td><b>{{ $activity->capacity }}</b></td>
                            <td><b>{{ $activity->start }}</b></td>
                            <td><b>{{ $activity->duration }}</b></td>
                            <td>
                                @if($activity->image !== null)
                                    <img src="{{ asset('img/'.$activity->image) }}" width="100" height="100" >
                                @else
                                    <p><b><i>Actividad sin imagen</i></b></p>
                                @endif
                            </td>
                            <td>
                                <div id="contenedorBotones">
                                <form class="form-buttons" action="{{  url(route('edit', $activity->id))  }}" method="GET">
                                    @csrf
                                    <input class="botonListado"  id="update" type="submit" name="update-activity" value="Modificar Actividad">
                                </form>
                                <form class="form-delete form-buttons" action="{{  url(route('delete', $activity->id))  }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <input class="botonListado" id="delete" type="submit" name="delete-user" value="Eliminar Actividad">
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach  
                </table>
            </div>
           @endif
        </div>
        


        <footer class="footer">
            <p><b>
            <a href="###"><i class="fab fa-facebook"></i></a> 
            <a href="###"><i class="fab fa-twitter-square"></i></a> 
            <a href="###"><i class="fab fa-instagram"></i></a></b></p>
            <p><b>Todos los derechos Reservados. VIVETUGRANCANARIA COMPANY  &copy;</b></p>
            </footer>
    </body>
</html>
