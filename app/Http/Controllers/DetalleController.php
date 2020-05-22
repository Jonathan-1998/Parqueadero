<?php

namespace App\Http\Controllers;

use App;
use App\Parqueadero;
use App\Cliente;
use Illuminate\Http\Request;

class DetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalles = App\Detalle::orderby('Hora_entrada','asc')->get();
        return view('detalle.index', compact('detalles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = App\Vehiculo::orderby('placa_vehiculo','asc')->get();
        $clientes = App\Cliente::orderby('numero_documento','asc')->get();
        return view('detalle.insert', compact('vehiculos','clientes'));
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
            'Hora_entrada' => 'required',
            'fecha' => 'required',
            'idVehiculo' => 'required',
            'idCliente' => 'required',
              
        ]);
          App\Detalle::create($request->all());
 
          return redirect()->route('detalle.index')
                        -> with('exito','se ha creado detalle con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = App\Detalle::join('vehiculos','detalles.idVehiculo','vehiculos.id')
                                ->join('clientes','detalles.idCliente','clientes.id')
                                ->select('detalles.*', 'vehiculos.placa_vehiculo as vehiculo', 'clientes.numero_documento as cliente')
                                ->where('detalles.id', $id)
                                ->first();

        return view('detalle.view', compact('detalle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculos = App\Vehiculo::orderby('placa_vehiculo','asc')->get();
        $clientes = App\Cliente::orderby('numero_documento','asc')->get();
        $detalle = App\Detalle::findorfail($id);
        return view('detalle.edit', compact('detalle','vehiculos','clientes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Hora_entrada' => 'required',
            'fecha' => 'required',
            'idVehiculo' => 'required',
            'idCliente' => 'required',
                  
        ]);
            
        $detalle = App\Detalle::findorfail($id);
        $detalle->update($request->all());

        return redirect()->route('detalle.index')
                     ->with('exito', 'detalle modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detalle  $detalle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalle = App\Detalle::findorfail($id);

        $detalle->delete();

        return redirect()->route('detalle.index')
                     ->with('exito', 'detalle eliminada correctamente');
    }
}
