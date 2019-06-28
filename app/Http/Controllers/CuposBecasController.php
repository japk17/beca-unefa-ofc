<?php

namespace App\Http\Controllers;

use App\TypeBeca;
use App\CupoBeca;
use App\Estudiante;//
use App\IncidenciaBecaEstudiante as Incidencia;//
use Illuminate\Http\Request;


class CuposBecasController extends Controller
{

    public function index()
    {
        return view('cuposBecas.index');
    }


    public function addView(){
        //$estudiantes    = Estudiante::all()->pluck('cedula','id');
        //dd($estudiantes);
        $estudiantesobj    = Estudiante::all();
        foreach($estudiantesobj as $estudiante){

            $estudiantes[$estudiante->id] = $estudiante->cedula.' - '.$estudiante->nombre.' '.$estudiante->apellido;
        }
        $type_beca      = TypeBeca::all()->pluck('name','id');
        return view('cuposBecas.add',compact('estudiantes','type_beca'));
    }

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
                return '<!--<a href="'.route("cuposbecas.edit",$estudiantes->id).'" class="btn btn-primary">Editar</a> &nbsp;-->&nbsp;
                <a href="'.route("pre-eliminar.cupo.beca",$estudiantes->id).'" class="btn btn-danger">Eliminar</a> &nbsp;';
            })
            ->editColumn('id', 'ID: {{$id}}')->toJson();

    }


    public function store(Request $request)
    {
        //dd($request->all());
        $cupo = CupoBeca::where('estudiante_id',$request->estudiante_id)->first();
        
        if(empty($cupo->id) != true){
            flash('Ya se encuentra registrado', 'danger');
            return redirect()->route('cuposbecas.index');
        } else {
            CupoBeca::create([
                'estudiante_id' => $request->estudiante_id,
                'type_beca_id' => $request->type_beca_id
            ]);
            flash('Cupo Registrado', 'success');
            return redirect()->route('cuposbecas.index');
        }

    }

    public function show($id)
    {
        dd($id);
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request,$id)
    {
        $incidencia = Incidencia::create([
            'type_beca_id'      => $request->type_beca_id,
            'estudiante_id'     => $request->estudiante_id,
            'explication'       => $request->observacion
        ]);
        if(empty($incidencia->id) != true){
            $cupo = CupoBeca::find($id);
            $cupo->delete();
            flash('Cupo Eliminado', 'success');
        } else {
            flash('Cupo no eliminado', 'danger');
        }
        
        return redirect()->route('cuposbecas.index');
    }

    public function eliminar($id){
        $cupo = CupoBeca::find($id);
        $cupo->load('estudiante','typeBeca');
        //dd($cupo);
        return view('cuposBecas.create',compact('cupo'));
    }
}
