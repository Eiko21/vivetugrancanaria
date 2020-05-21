@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-left:10%; margin-bottom: 3%;">
                <h2>Nueva actividad</h2>
            </div>
        </div>
        <div class="form_add_user" style="padding-left:8%;">
            <form action="{{ url(route('storeactivity')) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Nombre"><b>* Nombre de la actividad</b></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="Tipo"><b>* Tipo</b></label>
                        <input type="text" class="form-control" name="type" id="type" placeholder="Tipo" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Descripcion"><b>* Descripción</b></label>
                    <textarea class="form-control" id="description" name="description" rows="10" 
                        placeholder="Escriba la descripción de la actividad" cols="40"></textarea>
                </div>
                <div class="form-group">
                    <label for="Precio"><b>* Precio</b></label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Precio" min="0" step="any" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="Duracion"><b>* Duración (En horas)</b></label>
                        <input type="number" class="form-control" name="duration" id="duration"  min="0" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="Fecha"><b>* Fecha</b></label>
                        <input type="date" class="form-control" name="start" id="start" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="Aforo"><b>* Aforo</b></label>
                        <input type="number" name="capacity" class="form-control" id="capacity" placeholder="Aforo" min="1" required>
                    </div>
                    <div class="form-group col-md-0">
                        <label for="Imagen"><b>Imagen</b></label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                </div>
                {{-- <input type="hidden" name="companyid" value="{{  }}"> --}}
                <button type="submit" name="store-activity" class="btn btn-primary">Añadir</button>
            </form>
        </div>
    </div>
@endsection