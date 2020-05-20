@extends('layout.layout')

@section('titulo','Modificar Cliente')

@section('contenido')
<h1 class="text-center">Modificar Cliente</h1>
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

<form action="{{route('cliente.update', $cliente->id)}} " method="post">
    @csrf
    @method('PUT')
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del cliente: </label>
            <input type="text" class="form-control" name="nombre" value="{{$cliente->nombre}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Telefono: </label>
            <input type="number" class="form-control" name="telefono" value="{{$cliente->telefono}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Numero documento: </label>
            <input type="number" class="form-control" name="numero_documento" value="{{$cliente->numero_documento}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Parqueadero:</label>
            <select name="idParqueadero" class="form-control" >
                @foreach ($parqueaderos as $parqueadero)
                <option value="{{$parqueadero->id}}"
                    @if ($cliente->idParqueadero == $parqueadero->id) 
                    selected   
                    @endif>
                    {{$parqueadero->nombre}}</option>
                @endforeach   
            </select>
        </div>
    </div>

      
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Cliente</button>

    </div>

    <br>
    <div>
        <a href="{{route('cliente.index')}}"><button class="btn btn-primary">Volver</button></a>  
    </div>

</form>
@endsection
