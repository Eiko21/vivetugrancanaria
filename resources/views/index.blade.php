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
        
    @endsection