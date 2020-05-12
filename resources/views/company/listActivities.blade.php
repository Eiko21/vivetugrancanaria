@extends('layouts.app')
@section('content')
    <div class="container">
                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px"><h2>Listado de actividades</h2></div>
        </div>
        <div class="row">
            <div class="col text-right">
            <a href="{{  url(route('create', $companyid))  }}" id="add-activity" class="btn btn-info"><i class="fas fa-plus-circle"></i> AÑADIR</a>
            </div>
        </div>
        @if($activities->isEmpty())
            <h3>Oh Oh! Aún no tienes actividades Puedes añadirla en el botón 'Añadir actividad'</h3> 
         @else        
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead class="bg-info">
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
                            <td>{{ $activity->capacity }} personas</td>
                            <td>{{ $activity->start }}</td>
                            <td>{{ $activity->duration }}</td>
                            <td>
                                @if($activity->image !== null)
                                <img src="<?php echo asset('img/' . $activity->image); ?>"  width="100" height="100">                                
                                @else
                                    <p><b><i>Actividad sin imagen</i></b></p>
                                @endif
                            </td>
                            <td>
                                <div id="contenedorBotones">
                                <a href="{{  url(route('edit', $activity->id, $companyid))  }}" id="update-activity"class="btn btn-success"><i class="fas fa-edit"></i></a>
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
           @endif
        </div> 
@endsection
