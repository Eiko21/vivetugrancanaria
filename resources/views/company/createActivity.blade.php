<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Styles -->
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
      
    </head>
     <body>  
        <div class="m-b-md">
            <b>Añadir Actividad</b>
        </div>
        <div class="content">
            <div class="form_add_user">
                <h2>Nueva Actividad</h2>
                <h5>*Campos obligatorios</h5>
                <form class="flex-center" method="POST" action = "{{ url(route('store', $id))  }}" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <label for="Nombre"><b>* Nombre</b></label>
                                <input type="text" name="name" id="name" placeholder="Nombre" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Tipo"><b>* Tipo</b></label>
                                <input type="text" name="type" id="type" placeholder="Tipo" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Descripcion"><b>Descripción</b></label>
                                <textarea id="description" name="description" rows="10" 
                                    placeholder="Escriba los descripción" cols="40"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Precio"><b>* Precio</b></label>
                                <input type="number" name="price" id="price" placeholder="Precio" min="0" step="any" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Aforo"><b>* Aforo</b></label>
                                <input type="number" name="capacity" id="capacity" placeholder="Aforo" min="0" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Fecha"><b>* Fecha</b></label>
                                <input type="date" name="start" id="start" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Duracion"><b>* Duración (En horas)</b></label>
                                <input type="number" name="duration" id="duration"  min="0" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="Imagen"><b>Imagen</b></label>
                                <input type="file" name="image" id="image">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="store-activity" value="Añadir">
                            </td>
                        </tr>
                        <input type="hidden" name="companyid" id="companyid" value="'.$companyid.'">
                    </table>
                </form>
            </div>
        </div><br><br><br>
       <footer class="footer">
            <p><b>
            <a href="###"><i class="fab fa-facebook"></i></a> 
            <a href="###"><i class="fab fa-twitter-square"></i></a> 
            <a href="###"><i class="fab fa-instagram"></i></a></b></p>
            <p><b>Todos los derechos Reservados. Vive Tu Gran Canaria COMPANY  &copy;</b></p>
            </footer>
    </body>
</html>
