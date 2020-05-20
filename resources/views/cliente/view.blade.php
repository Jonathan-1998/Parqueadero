@extends('layout.layout')

@section('titulo')
   Detalle de Cliente

@endsection

@section('contenido')
   <h1 class="text-center"> Detalle de Cliente</h1> 
   <br><br>

<div class="row">
            <h4>Nombre: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$cliente->nombre}}</p>
        </div>
</div> 

<br>

 <div class="row">
            <h4>Telefono: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$cliente->telefono}}</p>
        </div>
</div>

<br>

<div class="row">
            <h4>Numero documento: </h4>
        <div class="col-sm-3">
            <p class="lead">{{$cliente->numero_documento}}</p>
        </div>
</div>

<br>

<div class="row">
        <h4>Parqueadero: </h4>
        <div class="col-sm-3">
        <p class="lead">{{$cliente->parqueadero}}</p>
</div>
</div>


<br><br>

<div class="row">
    <a href=" {{route('cliente.index')}}"><button class="btn btn-primary">Volver</button></a>
 </div>
@endsection