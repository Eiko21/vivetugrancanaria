@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">
        <div class="form_add_user">
            <h2 style="text-align:center;">Actualización de su perfil</h2>
            <div class="py-5 text-center">
                <h4>Foto de Perfil</h4>
                    @if($user->image !== null)
                        <img src="<?php echo asset('img/' . $user->image); ?>" class="rounded-circle d-block mx-auto mb-4" 
                            width="200" height="200">
                    @else
                        <img alt="User Pic"
                            src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                            class="rounded-circle" width="200" height="200">
                    @endif          
            </div>
            <form method="POST" action="{{ url(route('update', $user->id))  }}" enctype="multipart/form-data">               
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6 col-md-offset-3">
                        <label for="Nombre"><b>Nombre</b></label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name')??$user->name }}" required>
                    </div>
                    <div class="form-group col-md-6 col-md-offset-3">
                        <label for="Tipo"><b>Ciudad</b></label>
                        <input type="text" class="form-control" name="city" id="city"
                            value="{{ old('city')??$user->city }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Precio"><b>E-mail</b></label>
                    <input type="email" class="form-control" name="email" id="email"
                        value="{{ old('email')??$user->email }}" min="0" step="any" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="Imagen"><b>Foto de perfil</b></label>
                    <input type="file" class="form-control" name="image" id="image" data-max-size=80000>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" name="store-activity" class="btn btn-primary">Modificar perfil</button>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                        <button type="submit" name="detele-account" class="btn btn-danger">Eliminar cuenta</button>
                        </div>
                    </div>
                </div>
                
            </form>
            <br>
            <hr>
            <br><br>
            <h2 style="margin-left:420px;">Modificar contraseña</h2><br>
            <div class="container">
                <div style="margin-left:400px" class="form-col">
                    <div class="col-md-8 ">
                        <div class="panel panel-default">   
                            <div class="panel-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('updatePassword', $user->id) }}">
                                    <input type='hidden' name='_method' value='PUT'>
                                    @csrf
                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <input id="current-password" type="password" class="form-control"
                                                name="current-password" placeholder="Contraseña actual" required>
                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <div class="col-md-8">
                                            <input id="new-password" type="password" class="form-control"
                                                name="new-password" placeholder="Nueva contraseña" required>
                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">                                       
                                        <div class="col-md-8">
                                            <input id="new-password-confirm" type="password" class="form-control"
                                                name="new-password_confirmation" placeholder="Repita la nueva contraseña" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div style="margin-right:auto;" class="col-md-8">
                                            <button type="submit" class="btn btn-primary">Modificar contraseña</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
