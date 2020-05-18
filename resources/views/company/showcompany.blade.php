@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px">
                <h2>{{ $company->name }}</h2>
            </div>
        </div>
        <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; margin-left:5%; padding-top: 3%;">
            <table class="table table-striped table-bordered">
                <thead class="bg-info">
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Teléfono de contacto</th>
                        <th>Correo electrónico</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @if($company->image !== null)
                                <img src="{{ asset('img/'.$company->image) }}" width="100" height="100" >
                            @else
                                <p><b><i>Empresa sin logo</i></b></p>
                            @endif
                        </td>
                        <td>{{ $company->name }}</td>                          
                        <td>{{ $company->description }}</td>
                        <td>{{ $company->contact }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <form class="form-buttons" action="{{  url(route('edit', $company->id))  }}" method="GET">
                                @csrf
                                <input class="botonListado btn btn-primary"  id="update" type="submit" name="update-company" value="Actualizar">
                            </form>
                        </td>
                    </tr>                        
                </tbody>
            </table>
        </div>
    </div> 
@endsection