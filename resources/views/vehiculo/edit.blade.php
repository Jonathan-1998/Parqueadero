@extends('layout.layout')

@section('titulo','Modificar vehiculo')

@section('contenido')
<h1 class="text-center">Modificar Vehiculo</h1>
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

<form action="{{route('vehiculo.update', $vehiculo->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Placa Vehiculo: </label>
            <input type="text" class="form-control" name="placa_vehiculo" value="{{$vehiculo->placa_vehiculo}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero de lugar: </label>
            <input type="text" class="form-control" name="numero_lugar" value="{{$vehiculo->numero_lugar}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Precio: </label>
            <input type="number" class="form-control" name="precio" value="{{$vehiculo->precio}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Parqueadero:</label>
            <select name="idParqueadero" class="form-control" >
                @foreach ($parqueaderos as $parqueadero)
                <option value="{{$parqueadero->id}}"
                    @if ($vehiculo->idParqueadero == $parqueadero->id) 
                    selected   
                    @endif>
                    {{$parqueadero->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

      
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar vehiculo</button>

    </div>

    <br>
    <div>
        <a href="{{route('vehiculo.index')}}"><button class="btn btn-primary">Volver</button></a>  
    </div>

</form>
@endsection
