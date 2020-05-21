@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px">
                <h2>{{ $activity->name }}</h2>
            </div>
        </div>
        <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; padding-top: 3%;">
            <form action="{{ url(route('createticket', $activity->id)) }}" method="GET" style="text-align: center;">
                <table class="table table-striped table-bordered">
                    <thead class="bg-info">
                        <tr>
                            <th></th>
                            <th>Tipo</th>
                            <th>Aforo</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Fecha</th> 
                            <th>Empresa organizadora</th>
                            <th>Número de tickets</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>    
                        <tr>
                            @if($activity->image !== null)
                                <td>
                                    <img src="{{ asset('img/'.$activity->image) }}" width="100" height="100" >
                                </td>
                            @else
                                <td>
                                    <p><b><i>Actividad sin imagen</i></b></p>                                
                                </td>
                            @endif
                            <td>{{ $activity->type }}</td>
                            <td>{{ $activity->capacity }}</td>
                            <td>{{ $activity->duration }}</td>
                            <td>{{ $activity->price }}</td>
                            <td>{{ $activity->start }}</td>
                            <td>
                                <a href="{{ url(route('showcompany',$activity->companyid)) }}">
                                    {{ $activity->companyname->name }}</a>
                            </td>   
                            <td><input type="text" name="quantity" value="1" size="5"></td>
                            <td>
                                <input type="submit" name="buyticket" value="Comprar ticket" class="btn btn-success">
                            </td>
                        </tr>              
                    </tbody>
                </table>
            </form>
        </div>
    </div> 
@endsection