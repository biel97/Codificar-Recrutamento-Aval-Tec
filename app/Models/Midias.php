<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Midias extends Model {
   	protected $table = 'midias';
    
	protected $fillable = ['id', 'nome', 'mimeType', 'extensao', 'numeroOcorrencias'];

   	protected $dates = ['deleted_at'];
 
}
