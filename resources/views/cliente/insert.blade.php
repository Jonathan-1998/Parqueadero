@extends('layout.layout')

@section('titulo')
    Nuevo Cliente
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Cliente</h1>
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

<form action="{{route('cliente.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del cliente: </label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono: </label>
            <input type="number" class="form-control" name="telefono" placeholder="0123">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero documento: </label>
            <input type="number" class="form-control" name="numero_documento" placeholder="0123">
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
        <button type="submit" class="btn btn-primary">Crear Cliente</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('cliente.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection