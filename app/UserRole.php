<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = "model_has_roles";
    protected $fillable = [
        'role_id',
        'model_id',
        'model_type'
    ];
    
    public function role(){
        return $this->belongsTo('App\Role','role_id');
    }
}
