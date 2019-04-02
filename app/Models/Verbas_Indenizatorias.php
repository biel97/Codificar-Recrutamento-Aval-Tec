<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Verbas_Indenizatorias extends Model {
    protected $table = 'verbas_indenizatorias';    
	
	protected $fillable = ['id', 'idDeputado', 'dataReferencia', 'valorReembolsado', 'dataEmissao', 'cpfCnpj', 'valorDespesa', 'nomeEmitente', 'descDocumento', 'codTipoDespesa', 'descTipoDespesa'];
	
	protected $dates = ['deleted_at'];
	
	function deputados() {
        return $this->belongsTo('App\Models\Deputados');
    }
}
