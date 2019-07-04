<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBeca extends Model
{
    protected $table = "type_becas";
    protected $fillable = [
        'id',
        'name',
    ];
}
