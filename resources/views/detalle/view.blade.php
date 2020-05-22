@extends('layout.layout')

@section('titulo')
   Detalle de Vehiculo

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Vehiculo</h1> 
   <br><br>
 <div class="row">
            <h4>Hora entrada: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$detalle->Hora_entrada}}</p>
        </div>
</div>

<br>

<div class="row">
        <h4>Fecha: </h4>
    <div class="col-sm-3">
        <p class="lead">{{$detalle->fecha}}</p>
    </div>
</div>

<br>

<div class="row">
        <h4>Vehiculo: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$detalle->vehiculo}}</p>
</div>
</div>

<br>

<div class="row">
        <h4>Cliente: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$detalle->cliente}}</p>
</div>
</div>


<br><br>

<div class="row">
    <a href=" {{route('detalle.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection