@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="form_add_user">
            <h2 style="text-align:center;">Modificar Perfil</h2>
            <div class="py-5 text-center">
                <h4>Foto de Perfil</h4>
                    @if($user->image !== null)
                        <img src="<?php echo asset('img/' . $user->image); ?>" class="rounded-circle d-block mx-auto mb-4" width="200" height="200">
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

                <center>
                    
                    <div class="form-group col-md-4">
                        <label for="Imagen"><b>Foto de perfil</b></label>
                        <input type="file" class="form-control" name="image" id="image" data-max-size=80000>
                    </div>
                </center>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <button type="submit" name="store-activity" class="btn btn-primary">Modificar perfil
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <br><br>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h2 style="text-align:center;">Modificar contraseña</h2></div>

                            <div class="panel-body">
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form class="form-horizontal" method="POST"
                                      action="{{ route('updatePassword', $user->id) }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Contraseña actual</label>

                                        <div class="col-md-6">
                                            <input id="current-password" type="password" class="form-control"
                                                   name="current-password" required>

                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
										<strong>{{ $errors->first('current-password') }}</strong>
									</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                        <label for="new-password" class="col-md-4 control-label">Nueva contraseña</label>

                                        <div class="col-md-6">
                                            <input id="new-password" type="password" class="form-control"
                                                   name="new-password" required>

                                            @if ($errors->has('new-password'))
                                                <span class="help-block">
										<strong>{{ $errors->first('new-password') }}</strong>
									</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="new-password-confirm" class="col-md-4 control-label">Confirmar nueva contraseña</label>

                                        <div class="col-md-6">
                                            <input id="new-password-confirm" type="password" class="form-control"
                                                   name="new-password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-3">
                                            <button type="submit" class="btn btn-primary">
                                                Modificar contraseña
                                            </button>
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
