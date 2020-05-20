@extends('layout.layout')

@section('titulo')
    Nuevo Vehiculo
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Vehiculo</h1>
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

<form action="{{route('vehiculo.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Placa Vehiculo: </label>
            <input type="text" class="form-control" name="placa_vehiculo" placeholder="ABC123">
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de lugar: </label>
            <input type="text" class="form-control" name="numero_lugar" placeholder="0-1-2">
        </div>
    </div>


    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Precio: </label>
            <input type="number" class="form-control" name="precio" placeholder="1000">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Parqueadero: </label>
            <select name="idParqueadero"  class="form-control">
                @foreach ($parqueaderos as $parqueadero)
            <option value="{{$parqueadero->id}}" >{{$parqueadero->nombre}}</option>
                    
                @endforeach
            </select>
            
        </div>
    </div>
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Vehiculo</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('vehiculo.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection