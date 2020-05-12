<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Actividades</title>     

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
        
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

         <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        </head>
    <body>
    <div class="container">
                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px"><h2>Listado de actividades</h2></div>
        </div>

            
            <!--<div class="form_add_user flex-center">   -->
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead class="bg-info">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Fecha</th>  
                    </tr>

                </thead>
                <tbody>
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
                </tbody>
                </table>
                </div>

        </div> 
        
  </body>
</html>  