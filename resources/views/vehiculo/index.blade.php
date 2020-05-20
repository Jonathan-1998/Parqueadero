@extends('layouts.app', ['activePage' => 'vehiculo','titlePage' => __('Vehiculo')])

@extends('layout.layout')

{{-- @section('titulo')
    Vehiculo
@endsection --}}

@section('content')
    <h1 class="text-center">Vehiculo</h1>
    <br><br>
    
    @if($message = Session::get('exito'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        
            <thead>
                <th>Placa vehiculo</th>
                <th>Numero de lugar</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>
        
            <tbody>
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{$vehiculo -> placa_vehiculo}}</td>
                    <td>{{$vehiculo -> numero_lugar}}</td>
                    <td>{{$vehiculo -> precio}}</td>
                    
                    
                                        
                    <td>
                         <form action="{{route('vehiculo.destroy', $vehiculo->id)}}" method="post">
                        <a href="{{route('vehiculo.show', $vehiculo->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('vehiculo.edit', $vehiculo->id)}}" class="btn btn-primary">Editar</a>

                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >Eliminar</button>
                        </form>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
<br><br>
    <div class="row">
        <a href="{{route('vehiculo.create')}} "><button class="btn btn-success">Crear Vehiculo</button></a>
    </div>
    
<br>

{{-- <div class="row">
    <a href="{{route('home')}}"><button class="btn btn-primary">Volver</button></a>
</div> --}}

@endsection