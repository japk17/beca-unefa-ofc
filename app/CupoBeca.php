<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupoBeca extends Model
{
    protected $table = "cupos_becas";
    protected $fillable = [
        'id',
        'estudiante_id',
        'type_beca_id',
    ];

    public function estudiante(){
        return $this->belongsTo('App\Estudiante','estudiante_id');
    }
    
    public function typeBeca(){
        return $this->belongsTo('App\TypeBeca','type_beca_id');
    }
}
