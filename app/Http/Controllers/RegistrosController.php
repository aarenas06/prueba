<?php

namespace App\Http\Controllers;

use App\registros;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegistrosController extends Controller
{

    protected $registros;
    public function __construct(registros $registros)
    {
        $this->registros = $registros;
    }
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

        $request->validate([

            'cc' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'nombreMas' => 'required',
            'fecha_cita' => 'required',
        ]);
        $info = registros::select('*')->where('fecha_cita', $request->fecha_cita)->count();
         if ($info == 0) {
             registros::create($request->all());
             session()->flash('message', 'Registro Exitoso');
             return redirect()->route('inicio');
         } else {
             session()->flash('message', ' Ya esta ocupado ese dia y hora  ');
             return redirect()->route('inicio');
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

        $actualizar = $request->except(['_token', '_method']);
        registros::where(['id' => $id])->update($actualizar);
        return redirect()->route('list');
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
    public function calendar()
    {
        return view('home.registrar');
    }

}