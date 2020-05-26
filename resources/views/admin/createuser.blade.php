@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-left:10%; margin-bottom: 3%;">
                <h2>Nuevo usuario</h2>
            </div>
        </div>
        <div class="form_add_user" style="padding-left:8%;">
            <form action="{{ url(route('storeuser')) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Nombre"><b>* Nombre</b></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Email"><b>E-mail</b></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="example@domain.com" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Descripcion"><b>* Descripción</b></label>
                    <textarea class="form-control" id="description" name="description" rows="10" 
                        placeholder="Escriba la descripción del usuario" cols="40"></textarea>
                </div>
                <div class="form-group">
                    <label for="Contraseña"><b>* Contraseña</b></label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="form-group">
                                <input id="password1" type="password" class="form-control @error('password') is-invalid @enderror" name="password1" required autocomplete="password1">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>La contraseña introducida no coincide.</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Ciudad"><b>Ciudad</b></label>
                        <input type="text" class="form-control" name="city" id="city" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Contacto"><b>Contacto</b></label>
                        <input type="text" class="form-control" name="contact" id="contact">
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                          <legend class="col-md-8 col-form-label text-md-right"><b>{{ __('Tipo de perfil') }}</b></legend>
                          <div class="col-md-10 text-center">
                            <div class="form-check">
                              <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="cliente" value="cliente" required autocomplete="role">
                              <label class="form-check-label" for="cliente">
                                Cliente
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input @error('role') is-invalid @enderror" type="radio" name="role" id="empresa" value="empresa" required autocomplete="role">
                              <label class="form-check-label" for="empresa">
                                Empresa
                              </label>
                            </div>
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                           </div>
                        </div>
                      </fieldset><br><br>
                    <div class="form-group col-md-0">
                        <label for="Imagen"><b>Imagen</b></label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div><br>
                <div class="text-center">
                <button type="submit" name="store-user" class="btn btn-primary">Añadir Usuario</button>
                </div>
            </form>
        </div>
    </div>
@endsection
