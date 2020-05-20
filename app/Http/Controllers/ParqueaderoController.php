<?php

namespace App\Http\Controllers;

use App;
use Gate;
use Illuminate\Http\Request;

class ParqueaderoController extends Controller
{
    public function listar()
    {
        $parqueaderos = App\Parqueadero::orderby('nombre','asc')->get();

        return response()->json([
               
            $parqueaderos

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parqueaderos = App\Parqueadero::orderby('nombre','asc')->get();
        return view('parqueadero.index', compact('parqueaderos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Gate::denies('Crear-parqueaderos'))
        
        // {
            return view('parqueadero.create');
        // }
        // return view('parqueadero.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->ajax())
        {
            App\Parqueadero::create($request->all());
            return response()->json([
               
              'mensaje' => 'creado'

                ]);
            }
            // //validar que lleguen todos los campos
            // $request->validate([
            //     'nombre' => 'required',
            //     'direccion' => 'required',
            //     'telefono' => 'required',
            //     'cantidad_camas' => 'required'    
            // ]);
            //   App\Parqueadero::create($request->all());
     
            //   return redirect()->route('parqueadero.index')
            //                 -> with('exito','se ha creado Parqueadero con exito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);

        // $hospital = App\Hospital::join('medicos', 'hospitals.idMedico', 'medicos.id')
        //                           select('hospitals.*', 'medicos.nombre as medico') 
        //                           where('hospitals.id', $id)
        //                           ->first();

        return view('parqueadero.view', compact('parqueadero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('editar-parqueadero')) {
            return redirect(route('parqueadero.index'));
        }
        $parqueadero = App\Parqueadero::findorfail($id);

        return response()->json([
            $parqueadero
            ]);

        // return view('parqueadero.edit', compact('parqueadero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parqueadero $id)
    {
        $request->validate([
            'nombre' => 'required',
            'puesto_auto' => 'required',
            'puesto_moto' => 'required'
               
        ]);
            
        $parqueadero = App\Parqueadero::findorfail($id);
        $parqueadero->update($request->all());
        return response()->json(
            ["mensaje" => "modificado"]

        );

        // return redirect()->route('parqueadero.index')
        //              ->with('exito', 'parqueadero modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parqueadero  $parqueadero
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parqueadero = App\Parqueadero::findorfail($id);

        $parqueadero->delete();

        return redirect()->route('parqueadero.index')
                     ->with('exito', 'parqueadero eliminado correctamente');
    }
}
