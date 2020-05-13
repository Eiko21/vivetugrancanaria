@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px">
                <h2>{{ $activity->name }}</h2>
            </div>
        </div>
        <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; margin-left:5%; padding-top: 3%;">
            <table class="table table-striped table-bordered table-hover">
                <thead class="bg-info">
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Aforo</th>
                        <th>Duración</th>
                        <th>Precio</th>
                        <th>Fecha</th> 
                        <th>Empresa organizadora</th> 
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
                        <td>
                            <a href="{{ url(route('showcompany',$activity->companyid)) }}">
                                {{ $activity->companyname->name }}</a>
                        </td>
                    </tr>                        
                </tbody>
            </table>
        </div>
    </div> 
@endsection