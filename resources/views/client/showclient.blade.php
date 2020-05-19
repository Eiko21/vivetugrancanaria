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
                                <img src="<?php echo asset('img/' . $user->image); ?>"  width="100" height="100">                                
                            @else
                                <img alt="User Pic" 
                                    src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" 
                                    id="profile-image1" class="img-circle img-responsive" width="100" height="100"> 
                            @endif      
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                            <div class="container" >
                                <h2>{{ $user->name }}</h2>
                            </div>
                            <hr>
                            <ul class="container details">
                                <li><p><span class="glyphicon glyphicon-user one" style="width:50px;">
                                    </span>{{ $user->name }}</p>
                                </li>
                                <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;">
                                    </span>{{ $user->email }}</p>
                                </li>
                            </ul>
                            <hr>
                            <div class="col-sm-5 col-xs-6 tital">Población: {{ $user->city }}
                            </div><br><br><br>
                            <div class="col-sm-5 col-xs-6 tital">
                                <a href="{{  url(route('editclient', $user->id))  }}" id="update-profile-client" class="btn btn-success">
                                    Editar perfil <i class="fas fa-edit"></i>
                                </a><br><br>
                                <!--<form class="form-delete form-buttons" method="POST"> 
                                    <input type='hidden' name='_method' value='DELETE'>
                                    @csrf-->
                                    <button type="submit" id="delete" name="delete-activity"class="btn btn-danger">Eliminar cuenta
                                        <i class="fas fa-trash"></i>
                                    </button>
                                <!--</form> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection