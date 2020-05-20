@extends('layout.layout')

@section('titulo')
    Nuevo Detalle
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Detalle</h1>
<br><br>

@if ($errors->any())
    <div class="alert alert-danger">
        <div class="header"> <strong>Ups. =)</strong>Algo anda mal...</div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
    </div>
@endif

<br><br>

<form action="{{route('detalle.store')}} " method="post">
    @csrf
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hora entrada: </label>
            <input type="text" class="form-control" name="Hora_entrada" placeholder="00:00">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Vehiculo: </label>
            <select name="idVehiculo"  class="form-control">
                @foreach ($vehiculos as $vehiculo)
            <option value="{{$vehiculo->id}}" >{{$vehiculo->placa_vehiculo}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cliente: </label>
            <select name="idCliente"  class="form-control">
                @foreach ($clientes as $cliente)
            <option value="{{$cliente->id}}" >{{$cliente->nombre}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear detalle</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('detalle.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection