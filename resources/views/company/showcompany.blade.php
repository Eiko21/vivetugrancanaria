@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tus datos de perfil</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-4 4">
                            @if($company->image !== null)
                                <img src="<?php echo asset('img/' . $company->image); ?>" class="rounded-circle d-block mx-auto mb-4" 
                                width="200" height="200">
                            @else
                                <img alt="User Pic"
                                    src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                    class="rounded-circle" width="200" height="200">
                            @endif     
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                            <div class="container" >
                                <h2>{{ $company->name }}</h2>
                            </div>
                            <hr>
                            <ul class="container details">
                                @if($company->description != null)
                                    <li><p><span class="glyphicon glyphicon-user one" style="width:50px;">
                                        </span>Descripción: <b>{{ $company->description }}</b></p>
                                    </li>
                                @else
                                    <li><p><span class="glyphicon glyphicon-user one" style="width:50px;">
                                        </span>Sin descripción</p>
                                    </li>
                                @endif
                                @if($company->contact != null)
                                    <li><p><span class="glyphicon glyphicon-user one" style="width:50px;">
                                        </span>Teléfono de contacto: <b>{{ $company->contact }}</b></p>
                                    </li>
                                @else
                                    <li><p><span class="glyphicon glyphicon-user one" style="width:50px;">
                                        </span>Sin teléfono de contacto</p>
                                    </li>
                                @endif
                                <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;">
                                    </span>Correo electrónico: <b>{{ $company->email }}</b></p>
                                </li>
                            </ul>
                            <hr>
                            <div class="col-sm-5 col-xs-6 tital">Población: {{ $company->city }}</div>
                            <br><br><br>
                            <div class="col-sm-5 col-xs-6 tital">
                                @csrf
                                <a href="{{  url(route('editcompany', $company->id))  }}" id="update-profile-client" class="btn btn-success">
                                    Editar perfil <i class="fas fa-edit"></i>
                                </a><br><br>
                                <!--<form class="form-delete form-buttons" method="POST"> 
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf-->
                                    <button type="submit" id="delete" name="delete-activity"class="btn btn-danger">
                                        Eliminar cuenta
                                        <i class="fas fa-trash"></i>
                                    </button>
                                <!--</form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection