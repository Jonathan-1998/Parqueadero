@extends('layout.layout')

@section('titulo','Modificar parqueadero')

@section('contenido')
<h1 class="text-center">Modificar Parqueadero</h1>
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

<form action="{{route('parqueadero.update', $parqueadero->id)}} " method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Parqueadero:</label>
            <input type="text" class="form-control" name="nombre" value="{{$parqueadero->nombre}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Puesto auto:</label>
            <input type="text" class="form-control" name="puesto_auto" value="{{$parqueadero->puesto_auto}}">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Puesto moto:</label>
            <input type="text" class="form-control" name="puesto_moto" value="{{$parqueadero->puesto_moto}}">
        </div>
    </div>  
    
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Modificar Parqueadero</button>
    </div>

</form>
@endsection
