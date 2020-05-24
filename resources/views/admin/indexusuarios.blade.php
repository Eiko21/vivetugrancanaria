@extends('layouts.basiclayout')
@section('infosection')
    <div class="container" style="margin-left:10%;">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-right:9%; margin-bottom: 3%;">
                <h2>Listado de usuarios registrados</h2>
            </div>
        </div>
            <div class="row">
                <div class="col text-center">
                    <a href="{{  url(route('createuser'))  }}" id="add-activity" class="btn btn-info">
                        <i class="fas fa-plus-circle"></i> AÑADIR USUARIO</a>
                </div>
            </div>

        <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; margin-left:5%; padding-top: 3%;">
            <table class="info-table">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Ciudad</th>
                    <th>Descripción</th>
                    <th>Contacto</th>
                    <th>Foto</th>
                    <th></th>
                </tr>
                @foreach ($users as $user)
                    @if($user->role !== 'administrador')
                        <tr>
                            <td><b>{{ $user->name }}</b></td>
                            <td><b>{{ $user->email }}</b></td>
                            <td><b>{{ $user->role }}</b></td>
                            <td><b>{{ $user->city}}</b></td>
                            <td>
                                @if($user->description !== null)
                                    <b>{{ $user->description}}</b>
                                @else
                                    <b>Empresa sin descripción</b>
                                @endif
                            </td>
                            <td>
                                @if($user->contact !== null)
                                    <b>{{ $user->contact}}</b>
                                @else
                                    <b>Empresa sin contacto</b>
                                @endif
                            </td>
                            <td>
                                @if($user->image !== null)
                                    <img src="{{ asset('img/'.$user->image) }}" width="100" height="100" >
                                @else
                                    <p><b><i>Usuario sin foto</i></b></p>
                                @endif
                            </td>
                            <td>
                                <form class="form-delete-admin" action="{{  url(route('deleteclient', $user->id))  }}" method="POST">
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf
                                    <button type="submit" id="delete" name="delete-activity"class="btn btn-danger">
                                        Eliminar usuario<i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
                <script>
                    $(".form-delete-admin").on("submit", function(){
                        return confirm("¿Está seguro de que desea eliminar este usuario?");
                    });
                </script>
            </table>
        </div>
    </div>
@endsection
