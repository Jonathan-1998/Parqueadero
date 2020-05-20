@extends('layout.layout')

@section('titulo')
    Nuevo Parqueadero
@endsection

@section('contenido')
<h1 class="text-center">Nuevo Parqueadero</h1>
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

<form action="{{route('parqueadero.store')}} " method="post">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Nombre del Parqueadero: </label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Puesto auto: </label>
            <input type="text" class="form-control" name="puesto_auto" placeholder="0-25">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Puesto moto: </label>
            <input type="text" class="form-control" name="puesto_moto" placeholder="0-25">
        </div>
    </div>

    <div class="form-row">
        <button type="submit" class="btn btn-primary">Crear Parqueadero</button>
    </div>

</form>

<br><br>
<div class="row">
<a href="{{route('parqueadero.index')}}"><button class="btn btn-primary">Volver</button></a>    
</div>
@endsection