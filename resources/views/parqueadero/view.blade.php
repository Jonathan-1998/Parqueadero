@extends('layout.layout')

@section('titulo')
   Detalle de Parqueadero

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Parqueadero</h1> 
   <br><br>
   <div class="row">
    <h4>Nombre : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$parqueadero->nombre}}</p>
</div>
</div>

<br>

<div class="row">
            <h4>Puestos autos: </h4>
            <div class="col-sm-3">
            <p class="lead">{{$parqueadero->puesto_auto}}</p>
        </div>
</div>

<br>

<div class="row">
    <h4>Puestos motos : </h4>
    <div class="col-sm-3">
    <p class="lead">{{$parqueadero->puesto_moto}}</p>
</div>
</div>

<br><br>

<div class="row">
    <a href=" {{route('parqueadero.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection