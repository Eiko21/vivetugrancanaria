@extends('layouts.basiclayout')

@section('infosection')
    <div class="container">
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px;  text-aling: center; margin-left: 12%;">
                <h2>Listado de actividades</h2>
            </div>
        </div>
        @if(!Auth::guest() && Auth::user()->role === ('empresa'))
            <div class="row">
                <div class="col text-right">
                    <a href="{{  url(route('createactivity'))  }}" id="add-activity" class="btn btn-info">
                        <i class="fas fa-plus-circle"></i> AÑADIR</a>
                </div>
            </div>
        @endif
        @if($activities->isEmpty())
            <h3 style="margin:15%; padding-top:4.5%; padding-left:6%;">
                Oh Oh! Aún no tienes actividades Puedes añadirla en el botón 'Añadir actividad'
            </h3> 
        @else        
            <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; margin-left:5%; padding-top: 3%;">
                @foreach ($activities as $activity)
                    <br>
                        <div class="card">
                            <div class="card-header bg-info">
                                <h4 style="display: inline;"><i class="fas fa-map-marker-alt"></i> 
                                    <a href="{{ url(route('showactivity',$activity->id)) }}" style="color:white;">
                                        {{$activity->name}}
                                    </a>
                                </h4>
                                @if(!Auth::guest() && Auth::user()->role === ('empresa'))
                                    <a href="{{  url(route('editactivity', $activity->id))  }}" id="update-activity" 
                                        class="btn btn-success"><i class="fas fa-edit"></i></a>
                                    <form class="form-delete form-buttons" action="{{  url(route('deleteactivity', $activity->id))  }}" 
                                        method="POST" style="display: inline;">
                                        <input type='hidden' name='_method' value='DELETE'>
                                        @csrf
                                        <button type="submit" id="delete" name="delete-activity"class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="col-md-4 4">
                                    @if($activity->image !== null)
                                        <img src="<?php echo asset('img/' . $activity->image); ?>" width="100" height="100">
                                    @endif
                                </div>
                                <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                                    <hr>
                                    <ul style="list-style-type:none;" class="container details">
                                        <li><p><span class="glyphicon glyphicon-user one"
                                                    style="width:50px;"></span><h4>{{ $activity->description }}</h4></p></li>
                                        <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>
                                                <i class="fas fa-calendar-week"></i> Fecha: {{ $activity->start }}</p></li>
                                    </ul>
                                    <hr>
                                    <div class="col-sm-5 col-xs-6 tital ">
                                        <span class="glyphicon glyphicon-envelope one" style="width:50px;">
                                            <i class="fas fa-euro-sign"></i> {{ $activity->price }}</span>
                                    </div>
                                </div>
                        </div>
                    <br>
                @endforeach
                <script>
                    $(".form-delete").on("submit", function(){
                        return confirm("¿Está seguro de que desea eliminar esta actividad?");
                    });
                </script>
            </div>
        @endif
    </div> 
@endsection