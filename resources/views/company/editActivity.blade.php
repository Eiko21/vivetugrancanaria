@extends('layouts.app')
@section('content') 
        <div class="container">
            <div class="form_add_user">
                <h2>Modificar Actividad</h2>
                <h5>*Campos obligatorios</h5>

                <form method="POST" action = "{{ url(route('update', $activity->id))  }}" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Nombre"><b>* Nombre</b></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name')??$activity->name }}" required>

                    </div>
                    <div class="form-group col-md-6">
                    <label for="Tipo"><b>* Tipo</b></label>
                    <input type="text" class="form-control" name="type" id="type" value="{{ old('type')??$activity->type }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion"><b>Descripción</b></label>
                                <textarea class="form-control" id="description" name="description" rows="10" 
                                    cols="40">{{ old('description')??$activity->description }}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="Precio"><b>* Precio</b></label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ old('price')??$activity->price }}" min="0" step="any" required>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Duracion"><b>* Duración (En horas)</b></label>
                                <input type="number" class="form-control" name="duration" value="{{ old('duration')??$activity->duration }}" id="duration"  min="0" required>
                     
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Fecha"><b>* Fecha</b></label>
                        <input type="date" class="form-control" value="{{ old('start')??$activity->start }}" name="start" id="start" required>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="Aforo"><b>* Aforo</b></label>
                    <input type="number" name="capacity" class="form-control" id="capacity" value="{{ old('capacity')??$activity->capacity }}" min="1" required>
                    </div>   
                  </div>
                  <center>
                    @if($activity->image !== null)
                            <img src="<?php echo asset('img/' . $activity->image); ?>"  width="300" height="300">                                  
                        @else
                            <p><b><i>Actividad sin imagen</i></b></p>
                        @endif
                        <div class="form-group col-md-4">
                            <label for="Imagen"><b>Imagen</b></label>
                                <input type="file"  class="form-control" name="image" id="image">
                        </div>
                    </center>
                  <input type="hidden" name="companyid" id="companyid" value="'.$companyid.'">
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

