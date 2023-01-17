<?php

namespace App\Http\Controllers;

use App\registros;
use Illuminate\Http\Request;


class Calendario extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $registros;
    public function __construct(registros $registros)
    {
        $this->registros = $registros;
    }
    
    public function index()
    {
        $datos = registros::all();
        $events = [];

        foreach ($datos as $d) {
            $events[] = [
                'id' => $d->id,
                'title' => $d->nombreMas,
                'start' => $d->fecha_cita,
                'persona' => $d->nombre . " " . $d->apellido,
                'data' => $d->created_at->format('Y-m-d'),
                'hora' => $d->created_at->format('H:i'),
            ];
        }

        return view('home.calendario', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(registros $id)
    {
        $datos = registros::find($id);
        return response()->json($datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}