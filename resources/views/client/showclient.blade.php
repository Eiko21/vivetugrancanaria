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
                            @if($user->image !== null)
                                <img src="<?php echo asset('img/' . $user->image); ?>" class="rounded-circle d-block mx-auto mb-4" 
                                width="200" height="200">
                            @else
                                <img alt="User Pic"
                                    src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                    class="rounded-circle" width="200" height="200">
                            @endif      
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                            <div class="container" >
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <hr>
                            <ul class="container details">
                                <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;">
                                    </span>Correo electrónico: <b>{{ $user->email }}</b></p>
                                </li>
                            </ul>
                            <hr>
                            <div class="col-sm-5 col-xs-6 tital">Ciudad: {{ $user->city }}</div>
                            <br><br><br>
                            <div class="row col-xs-12">
                                <a href="{{  url(route('editclient', $user->id))  }}" style="margin-left: 10px; width:150px; height:40px" 
                                    id="update-profile-client" class="btn btn-success">Editar perfil <i class="fas fa-edit"></i></a><br><br>
                                <span class="input-group-addon"></span>
                               <form class="form-delete form-buttons" action="{{  url(route('deleteclient', $user->id))  }}" method="POST"> 
                                   <input type='hidden' name='_method' value='DELETE'>
                                   @csrf
                                   <button type="submit" style="margin-left: 10px; width:150px; height:40px" id="delete" 
                                        name="delete-activity"class="btn btn-danger">Eliminar cuenta<i class="fas fa-trash"></i></button>
                               </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(".form-delete").on("submit", function(){
            return confirm("Si borra su cuenta perderá el acceso a sus tickets. ¿Está seguro que desea eliminar su cuenta?");
        });
     </script>
@endsection