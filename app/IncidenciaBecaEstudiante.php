<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidenciaBecaEstudiante extends Model
{
    protected $table = "incidencias_becas_estudiantes";
    protected $fillable = [
        'id',
        'cupo_beca_id',
        'estudiante_id',
        'explication',
    ];
}
