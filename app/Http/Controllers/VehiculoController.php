<?php

namespace App\Http\Controllers;

use App;
use App\Parqueadero;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehiculos = App\Vehiculo::orderby('placa_vehiculo','asc')->get();
        return view('vehiculo.index', compact('vehiculos')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parqueaderos = App\Parqueadero::orderby('nombre','asc')->get();
        return view('vehiculo.insert', compact('parqueaderos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validar que lleguen todos los campos
        $request->validate([
            'placa_vehiculo' => 'required',
            'numero_lugar' => 'required',
            'precio' => 'required',
            'idParqueadero' => 'required',

               
        ]);
          App\Vehiculo::create($request->all());
 
          return redirect()->route('vehiculo.index')
                        -> with('exito','se ha creado vehiculo con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = App\Vehiculo::join('parqueaderos','vehiculos.idParqueadero','parqueaderos.id')
        ->select('vehiculos.*', 'parqueaderos.nombre as parqueadero')
        ->where('vehiculos.id', $id)
        ->first();
return view('vehiculo.view', compact('vehiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parqueaderos = App\Parqueadero::orderby('nombre', 'asc')->get();
        $vehiculo = App\Vehiculo::findorfail($id);
        return view('vehiculo.edit', compact('vehiculo','parqueaderos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'placa_vehiculo' => 'required',
            'numero_lugar' => 'required',
            'precio' => 'required',
            'idParqueadero' => 'required',
        ]);
            
        $vehiculo = App\Vehiculo::findorfail($id);
        $vehiculo->update($request->all());

        return redirect()->route('vehiculo.index')
                     ->with('exito', 'vehiculo modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehiculo  $vehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = App\Vehiculo::findorfail($id);

        $vehiculo->delete();

        return redirect()->route('vehiculo.index')
                     ->with('exito', 'vehiculo eliminado correctamente');
    }
}
