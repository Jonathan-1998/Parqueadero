@extends('layout.layout')

@section('titulo','Modificar Detalle')

@section('contenido')
<h1 class="text-center">Modificar Detalle</h1>
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

<form action="{{route('detalle.update', $detalle->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hora entrada: </label>
            <input type="time" class="form-control" name="Hora_entrada" value="{{$detalle->Hora_entrada}}">
        </div>
    </div>

    <br>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Fecha: </label>
            <input type="date" class="form-control" name="fecha" value="{{$detalle->fecha}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Vehiculo:</label>
            <select name="idVehiculo" class="form-control" >
                @foreach ($vehiculos as $vehiculo)
                <option value="{{$vehiculo->id}}"
                    @if ($detalle->idVehiculo == $vehiculo->id) 
                    selected   
                    @endif>
                    {{$vehiculo->placa_vehiculo}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Cliente:</label>
            <select name="idCliente" class="form-control" >
                @foreach ($clientes as $cliente)
                <option value="{{$cliente->id}}"
                    @if ($detalle->idCliente == $cliente->id) 
                    selected   
                    @endif>
                    {{$cliente->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

      
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Detalle</button>

    </div>

    <br>
    <div>
        <a href="{{route('detalle.index')}}"><button class="btn btn-primary">Volver</button></a>  
    </div>

</form>
@endsection
