@extends('layouts.app')
@section('content')
    @foreach ($activities as $activity)
        <br>
        <div class="card">
            <div class="card-header bg-info"><i class="fas fa-map-marker-alt"></i><h4 style="color:white;"> <a href="{{action('ActivityController@show', ['id' => $activity->id])}}">{{$activity->name}}</a></h4></div>
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
                    <div class="col-sm-5 col-xs-6 tital "><span class="glyphicon glyphicon-envelope one" style="width:50px;"><i class="fas fa-euro-sign"></i> {{ $activity->price }}</span></div>

                </div>
            </div>
            <br>

    @endforeach
@endsection