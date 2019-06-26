<?php

namespace App\Http\Controllers;

use App\TypeBeca;
use App\CupoBeca;
use App\Estudiante;//
use Illuminate\Http\Request;


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
                <a href="'.route("eliminar.cupo.beca",$estudiantes->id).'" class="btn btn-danger">Eliminar</a> &nbsp;';
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
        //dd($request->all());
        $cupo = CupoBeca::where('estudiante_id',$request->estudiante_id)->first();
        if(count($cupo) >= 1){
            flash('Message', 'success');
            return redirect()->route('cuposbecas.index');
        } else {
            CupoBeca::create([
                'estudiante_id' => $request->estudiante_id,
                'type_beca_id' => $request->type_beca_id
            ]);
            flash('Message', 'danger');
            return redirect()->route('cuposbecas.index');
        }

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
    
    public function eliminar($id){
        $cupo = CupoBeca::find($id);
        $cupo->delete();
        return redirect()->route('cuposbecas.index');
    }
}
