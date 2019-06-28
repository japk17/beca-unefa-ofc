<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidenciaBecaEstudiante extends Model
{
    protected $table = "incidencias_becas_estudiantes";
    protected $fillable = [
        'id',
        'type_beca_id',
        'estudiante_id',
        'explication',
    ];
    
    public function estudiante(){
        return $this->belongsTo('App\Estudiante');
    }
    
    public function typebeca(){
        return $this->belongsTo('App\TypeBeca','type_beca_id');
    }
}
