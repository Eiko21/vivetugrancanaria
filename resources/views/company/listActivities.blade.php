<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actividades</title>     

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles  -->
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
        
        <!--Bootstrap-->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <!--MIS ESTILO -->
         <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        </head>
    <body>
    <div class="container">
        <div class="m-b-md">
            <b>Actividades</b>
        </div>         
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px"><h2>Listado de actividades</h2></div>
        </div>
        <div class="row">
            <div class="col text-right">
                <form action="{{  url(route('create', $companyid))  }}" method="GET">
                        @csrf
                        <button type="submit" name="create-activity" id="add-activity" class="btn btn-info"><i class="fas fa-plus-circle"></i> Añadir</button>
                </form>
            </div>
        </div>
        @if($activities->isEmpty())
            <h3>Oh Oh! Aún no tienes actividades Puedes añadirla en el botón 'Añadir actividad'</h3> 
         @else        
            
            <!--<div class="form_add_user flex-center">   -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Aforo</th>
                        <th>Fecha</th>
                        <th>Duración</th>
                        <th>Imagen</th>
                        <th colspan="2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                        <tr>
                            <td>{{ $activity->name }}</td>
                            <td>{{ $activity->type }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->price }} €</td>
                            <td>{{ $activity->capacity }}</td>
                            <td>{{ $activity->start }}</td>
                            <td>{{ $activity->duration }}</td>
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
                                    <button type="submit" id="update" name="update-activity" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                </form>
                            </td>
                            <td>
                                <form class="form-delete form-buttons" action="{{  url(route('delete', $activity->id))  }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <button type="submit" id="delete" name="delete-activity"class="btn btn-danger"><i class="fas fa-trash"></i></button>
 
                                </form>
                                </div>
                            </td>
                        </tr>                        
                    @endforeach
                </tbody>
                </table>
                </div>
            <!--</div>-->
           @endif
        </div> 
        


        <footer class="footer">
            <p><b>
            <a href="###"><i class="fab fa-facebook"></i></a> 
            <a href="###"><i class="fab fa-twitter-square"></i></a> 
            <a href="###"><i class="fab fa-instagram"></i></a></b></p>
            <p><b>Todos los derechos Reservados. VIVETUGRANCANARIA COMPANY  &copy;</b></p>
            </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>  

