@extends('layouts.app', ['activePage' => 'parqueadero', 'titlePage' => __('parqueadero')])
@extends('layout.layout')

@section('titulo')
    Parqueaderos
@endsection

@section('content')
@include('parqueadero.modal')
    <h1 class="text-center">Parqueaderos</h1>
    <br><br>
    
    @if($message = Session::get('exito'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered">
        
            <thead>
                <th>Nombre</th>
                <th>Puestos autos</th>
                <th>Puestos motos</th>
                <th>Acciones</th>
            </thead>
        
            <tbody id="tablaDatos">
                @foreach ($parqueaderos as $parqueadero)
                <tr>
                    <td>{{$parqueadero -> nombre}}</td>
                    <td>{{$parqueadero -> puesto_auto}}</td>
                    <td>{{$parqueadero -> puesto_moto}}</td>
                                       
                    <td>
                         <form action="{{route('parqueadero.destroy', $parqueadero->id)}}" method="post">
                        <a href="{{route('parqueadero.show', $parqueadero->id)}}" class="btn btn-info">Ver</a>
                        {{-- <a href="{{route('parqueadero.edit', $parqueadero->id)}}" class="btn btn-primary">Editar</a> --}}
                         <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" value="{{$parqueadero->id}}" onclick="mostrar(this)">
                                Editar
                            </button>
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
        <a href="{{route('parqueadero.create')}} "><button class="btn btn-success">Crear Parqueadero</button></a>
    </div>
    
<br>



    <script>
        function mostrar(btn) {
            console.log(btn.value);   
            var ruta = "hospital/" + btn.value + "/edit";
            $.get(ruta, function(respuesta){
                console.log(respuesta[0]);
                $('#nombre').val(respuesta[0].nombre);
                $('#puesto_auto').val(respuesta[0].puesto_auto);
                $('#puesto_moto').val(respuesta[0].puesto_moto);
                $('#id').val(respuesta[0].id);
                        
            });
        }

        $('#actualizar').click(function(){
            var id = $('#id').val();
            var datos = $('#formulario').serialize();
            var ruta = 'parqueadero/' + id;

            $.ajax({
                data: datos,
                url: ruta,
                type: 'PUT',
                dataType: 'json',
                success: function() {
                    alert('Datos modificados');
                    cargarDatos(); 
                }
            }); 
        });

        function cargarDatos() {
            var tabla = $('#tablaDatos');
            var ruta = 'parqueadero';  

            tabla.empty();

            $.get(ruta, function(respuesta) {
                console.log(respuesta);
                respuesta[0].forEach(element => {
                    tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.puesto_auto + "</td><td>" +
                                 "</td><td>" + element.puesto_moto + "</td><td><button class='btn btn-info'>Ver</button></a><button class='btn btn-primary'>Editar</button><button class='btn btn-danger'>Eliminar</button></a></a></td></tr>");
                    
                });

            });
            

        }
    

    </script>

@endsection