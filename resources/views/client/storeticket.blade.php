@extends('layouts.basiclayout')
@section('infosection')
    <div class="container">                
        <div>
            <div id="list-title" class="text-center" style="color:#008CBA; font-size:40px">
                <h2>Pago de ticket</h2>
            </div>
        </div>
        <div class="table-responsive" style="margin: 1%; padding-bottom: 1%; margin-left:5%; padding-top: 3%;">
            <form action="{{ url(route('storeticket', $activity->id)) }}" method="POST" id="form-pago">
                @csrf
                <table class="table table-bordered">
                    <tr>
                        <td><label for="user-name">Titular de la tarjeta</label></td>
                        <td><input type="text" name="user-name" placeholder="Nombre del titular" required></td>
                    </tr>
                    <tr>
                        <td><label for="num">Número de la tarjeta</label></td>
                        <td><input type="text" name="tarj-num" placeholder="123-456-789-101" required></td>
                    </tr>
                    <tr>
                        <td><label for="ccv">CCV</label></td>
                        <td><input type="text" name="ccv" placeholder="123" required></td>
                    </tr>
                    <tr>
                        <td><label for="caducidad">Fecha de caducidad</label></td>
                        <td><input type="date" name="caducidad" placeholder="dd/mm/yyyy" required></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Número de tickets</label></td>
                        <td><input type="text" name="quantity" value="{{ $quantity }}" size="5" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Precio/ticket</label></td>
                        <td><input type="text" name="price" value="{{ $activity->price }}" size="5" readonly></td>
                    </tr>
                    <tr>
                        <td><label for="price">Total a pagar (€)</label></td>
                        <td><input type="text" name="total" value="{{ $total }}" size="5" readonly></td>
                    </tr>
                </table>
                <div style="text-align: center;">
                    <input type="submit" name="pagar" value="Pagar" class="btn btn-success">
                </div>
            </form>
        </div>
    </div> 
@endsection