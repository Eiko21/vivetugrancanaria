@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-left:10%; margin-bottom:3%;">
                <h2>Actualice su información</h2>
            </div>
        </div>
        <div class="table-responsive">
            <form action="{{ url(route('update', $details->id)) }}" method="POST" enctype="multipart/form-data">
                <input type='hidden' name='_method' value='PUT'>
                @csrf
                <table class="info-table" style="margin: 2.5%; margin-left:10%;">
                    <tr>
                        <td><label for="name">Nombre</label></td>
                        <td><input name="name" type="text" value="{{ old('name')??$details->name }}"></td>
                    </tr>
                    <tr>
                        <td><label for="description">Descripción</label></td>
                        <td><input name="description" type="text" value="{{ old('description')??$details->description }}"></td>
                    </tr>
                    <tr>
                        <td><label for="contact">Contacto</label></td>
                        <td><input name="contact" type="text" value="{{ old('contact')??$details->contact }}"></td>
                    </tr>
                    <tr>
                        <td><label for="image">Logo</label></td>
                        <td><input type="file" name="image"></td>
                    </tr>  
                    <tr>
                        <td>
                            <input type="submit" name="update-user" value="Actualizar" class="btn btn-primary">
                        </td>
                    </tr>     
                </table>
            </form>
        </div>
    </div>
@endsection