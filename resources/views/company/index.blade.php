<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listado de empresas</title>
</head>
<body>
    <div class="content">
        <div class="form_add_user flex-center">
            <table id="listado">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Contacto</th>
                    <th></th>
                    <th></th>
                </tr>
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
                                    <input class="botonListado"  id="update" type="submit" name="update-company" value="Actualizar">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>