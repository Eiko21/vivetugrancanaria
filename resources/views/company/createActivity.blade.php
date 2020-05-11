<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Añadir Actividad</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!--Bootstrap-->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <!--MIS ESTILO -->
         <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
      
    </head>
    <body>  
        <div class="container">
            <div class="form_add_user">
                <h2>Nueva Actividad</h2>
                <h5>*Campos obligatorios</h5>

                <form method="POST" action = "{{ url(route('store', $id))  }}" enctype="multipart/form-data">
                @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="Nombre"><b>* Nombre</b></label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required>

                    </div>
                    <div class="form-group col-md-6">
                    <label for="Tipo"><b>* Tipo</b></label>
                    <input type="text" class="form-control" name="type" id="type" placeholder="Tipo" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Descripcion"><b>Descripción</b></label>
                                <textarea class="form-control" id="description" name="description" rows="10" 
                                    placeholder="Escriba los descripción" cols="40"></textarea>
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
                                <input type="file"  class="form-control" name="image" id="image">
                    </div>
                  </div>
                  <input type="hidden" name="companyid" id="companyid" value="'.$companyid.'">
                  <button type="submit" name="store-activity" class="btn btn-primary">Añadir</button>
                </form>

            </div>
        </div>
    </body>
</html>
