@extends('layouts.basiclayout')
@section('infosection')
<div class="container" style="margin:7%;">
    <div>
        <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px; padding-left:10%;">
            <h2>Tus tickets</h2>
        </div>
    </div>
    <div class="table-responsive">
        @if($tickets->count() > 0)
            <table class="info-table" style="margin: 4%;">
                <thead class="bg-info">
                    <tr>
                        <th>Nombre de la actividad</th>
                        <th>Precio ticket</th>
                        <th>Cantidad comprada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td><b>{{ $ticket->activity->name }}</b></td>
                            <td><b>{{ $ticket->price }}</b></td>
                            <td><b>{{ $ticket->quantity }}</b></td>
                        </tr>
                </tbody>
                @endforeach
            </table>
        @else
            <h3 style="margin:12.6%; padding-top:4.5%; padding-left:6%;">No tiene ningún ticket</h3> 
        @endif
    </div>
</div>
@endsection