@extends('layouts.app')
@section('content')
    <div class="container">
                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px"><h2>Listado de actividades</h2></div>
        </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                <thead class="bg-info">
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Aforo</th>
                        <th>Duración</th>
                        <th>Precio</th>
                        <th>Fecha</th> 
                        <th>Empresa</th> 
                    </tr>
                </thead>
                <tbody>
                        <tr>
						    <td>
                                @if($activity->image !== null)
                                    <img src="{{ asset('img/'.$activity->image) }}" width="100" height="100" >
                                @else
                                    <p><b><i>Actividad sin imagen</i></b></p>
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
                </tbody>
                </table>
                </div>
        </div> 
        
    @endsection