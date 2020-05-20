@extends('layout.layout')

@section('titulo')
   Detalle de Vehiculo

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Vehiculo</h1> 
   <br><br>
 <div class="row">
            <h4>Placa Vehiculo: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$vehiculo->placa_vehiculo}}</p>
        </div>
</div>

<br>

<div class="row">
            <h4>Numero de lugar: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$vehiculo->numero_lugar}}</p>
        </div>
</div>


<br>

<div class="row">
            <h4>Precio: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$vehiculo->precio}}</p>
        </div>
</div>


<br><br>

<div class="row">
    <a href=" {{route('vehiculo.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection