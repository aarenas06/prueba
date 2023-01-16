<?php

namespace App\Http\Controllers;

use App\registros;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegistrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.registrar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $datos = registros::all();

        $fechaActual = Carbon::now();
        $fechaActual->setTimezone('America/Bogota');
        $horaActual = Carbon::now();
        $horaActual->setTimezone('America/Bogota');

        return view('home.list', compact('datos', 'fechaActual', 'horaActual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $hora = Carbon::createFromFormat('h:i:s A', $request->hora);
        $request->validate([

            'cc' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'nombreMas' => 'required',
            'fecha_cita' => 'required',
            'hora' => 'required',
        ]);
        $info = registros::select('*')->where('fecha_cita', $request->fecha_cita)->where('hora', $request->hora)->count();
        if ($info == 0) {
            registros::create($request->all());
            session()->flash('message', 'Registro Exitoso');
            return redirect()->route('registrar.index');
        } else {
            session()->flash('message', ' Ya esta ocupado ese dia y hora  ');
            return redirect()->route('registrar.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function show(registros $registros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function edit(registros $registros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->fecha_cita==null) {
            $actualizar= $request->except(['_token','_method','fecha_cita']);
        }else {
            $actualizar= $request->except(['_token','_method']);
        }
        registros::where(['id'=>$id])->update($actualizar);
        return redirect()->route('registrar.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registros  $registros
     * @return \Illuminate\Http\Response
     */
    public function destroy(registros $registros)
    {
        //
    }
}