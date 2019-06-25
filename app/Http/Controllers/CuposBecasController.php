<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;
use App\CupoBeca;

class CuposBecasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cuposBecas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estudiantes = CupoBeca::with('estudiante')->get();
        return datatables()->of($estudiantes)

            ->addColumn('name', function ($estudiantes) {
                return $estudiantes->estudiante->nombre;
            })
            ->addColumn('last_name', function ($estudiantes) {
                return $estudiantes->estudiante->apellido;
            })
            ->addColumn('cedula', function ($estudiantes) {
                return $estudiantes->estudiante->cedula;
            })
            ->addColumn('type_beca', function ($estudiantes) {
                return $estudiantes->typeBeca->name;
            })
            ->addColumn('fecha_nacimiento', function ($estudiantes) {
                return $estudiantes->estudiante->fecha_nacimiento;
            })
            ->addColumn('action', function ($estudiantes) {
                return '<!--<a href="'.route("cuposbecas.edit",$estudiantes->id).'" class="btn btn-primary">Editar</a> &nbsp;-->';
            })
            ->editColumn('id', 'ID: {{$id}}')->toJson();

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
    public function edit($id)
    {
        //
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
