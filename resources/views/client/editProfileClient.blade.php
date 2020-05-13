@extends('layouts.app')
@section('content') 
        <div class="container">
            <div class="form_add_user">
                <h2>Modificar Actividad</h2>
                <h5>*Campos obligatorios</h5>

                <form method="POST" action = "{{ url(route('update', $user->id))  }}" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Nombre"><b>Nombre</b></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name')??$user->name }}" required>

                    </div>
                    <div class="form-group col-md-6">
                    <label for="Tipo"><b>Ciudad</b></label>
                    <input type="text" class="form-control" name="type" id="city" value="{{ old('city')??$user->city }}" required>
                    </div>
                  </div>             
                  <div class="form-group">
                    <label for="Precio"><b>E-mail</b></label>
                    <input type="email" class="form-control" name="price" id="email" value="{{ old('email')??$user->email }}" min="0" step="any" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="Duracion">Contaseña antigüa</b></label>
                                <input type="password" class="form-control" name="before_password" id="before_password" required>
                     
                    </div>
                    <div class="form-group col-md-4">
                    <label for="Duracion">Nueva contraseña</b></label>
                                <input type="password" class="form-control" name="new_password1" id="new_password1"  required>
                     
                    </div>
                    <div class="form-group col-md-4">
                    <label for="Duracion">Repita la nueva contraseña</b></label>
                                <input type="password" class="form-control" name="new_password2" id="new_password2"  required>
                     
                    </div>
                  </div>
                  <center>
                    @if($user->image !== null)
                            <img src="<?php echo asset('img/' . $activity->image); ?>"  width="300" height="300">                                  
                        @else
                           <img alt="User Pic" src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" class="rounded-circle" width="200" height="200"> 
                        @endif
                        <div class="form-group col-md-4">
                            <label for="Imagen"><b>Imagen</b></label>
                                <input type="file"  class="form-control" name="image" id="image" data-max-size=80000>
                        </div>
                    </center>
                  <div class="container">
                      <div class="row">
                        <div class="col text-center">
                          <button type="submit" name="store-activity" class="btn btn-primary">Modificar</button>
                        </div>
                      </div>
                  </div>
                </form>

            </div>
        </div>
@endsection
