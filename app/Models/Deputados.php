<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deputados extends Model {
    protected $table = 'deputados';
    
    protected $fillable = ['id', 'nome', 'partido', 'tagLocalizacao'];

    protected $dates = ['deleted_at'];

    public function jobs() {
        return $this->hasMany('App\Models\Verbas_Indenizatorias');
    }
}
