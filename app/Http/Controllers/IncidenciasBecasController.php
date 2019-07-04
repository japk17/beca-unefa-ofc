<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IncidenciaBecaEstudiante as Incidencia;
use App\Estudiante;

class IncidenciasBecasController extends Controller
{

    public function index()
    {
        return view('incidencias.index');
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $estudiante = Estudiante::where('cedula',$request->cedula)->has('incidenciasbeca')->first();
        //dd($estudiante);
        if(empty($estudiante) != true){
            return view('incidencias.create',compact('estudiante'));
        } else {
            flash('Estudiante no posee Incidencia o no existe, intente de nuevo', 'danger');
            return view('incidencias.index',compact('estudiante'));
        }
    }


    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
         $estudiantes = Incidencia::where('estudiante_id',$id)->with('estudiante','typebeca')->get();
        //dd($estudiantes[0]);
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
            ->addColumn('observacion', function ($estudiantes) {
                return $estudiantes->explication;
            })
            ->editColumn('id', '{{$id}}')->toJson();
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
