@extends('layouts.basiclayout')

@section('infosection')
    <div class="container">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-left:10%; margin-bottom:3%;">
                <h2>Empresas registradas</h2>
            </div>
        </div>
        <div class="table-responsive">
            <table class="info-table" style="margin-left: 10%;">
                <thead class="bg-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Contacto</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td><b>{{ $company->name }}</b></td>
                            <td><b>{{ $company->description }}</b></td>
                            <td><b>{{ $company->contact }}</b></td>
                            <td>
                                @if($company->image !== null)
                                    <img src="{{ asset('img/'.$company->image) }}" width="100" height="100" >
                                @else
                                    <p><b><i>Sin foto</i></b></p>
                                @endif
                            </td>
                            <td>
                                <div id="contenedorBotones">
                                    <form class="form-buttons" action="{{  url(route('edit', $company->id))  }}" method="GET">
                                        @csrf
                                        <input class="botonListado btn btn-primary"  id="update" type="submit" name="update-company" value="Actualizar">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection