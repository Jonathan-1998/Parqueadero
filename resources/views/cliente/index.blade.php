
@extends('layout.layout')

@section('titulo')
    Clientes
@endsection

@section('contenido')
    <h1 class="text-center">Clientes</h1>
    <br><br>
    
    @if($message = Session::get('exito'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        
            <thead>
                <th>Nombre</th>
                <th>Numero documento</th>
                <th>Telefono</th>
                <th>Acciones</th>
            </thead>
        
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td>{{$cliente -> nombre}}</td>
                    <td>{{$cliente -> telefono}}</td>
                    <td>{{$cliente -> numero_documento}}</td>
                    
                                        
                    <td>
                         <form action="{{route('cliente.destroy', $cliente->id)}}" method="post">
                        <a href="{{route('cliente.show', $cliente->id)}}" class="btn btn-info">Ver</a>
                        <a href="{{route('cliente.edit', $cliente->id)}}" class="btn btn-primary">Editar</a>

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
        <a href="{{route('cliente.create')}} "><button class="btn btn-success">Crear Cliente</button></a>
    </div>
    
<br>

<div class="row">
    <a href="{{route('home')}}"><button class="btn btn-primary">Volver</button></a>
</div>

@endsection