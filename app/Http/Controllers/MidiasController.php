<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MidiasIndenizatorias;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MidiasController extends Controller {
    
    public function index() {
	    $list = DB::select('SELECT * FROM midias ORDER BY numeroOcorrencias DESC');
	            
	    $midias = array();
	     
	    foreach ($list as $row) {
	        $midias[] = array("id" => $row->id, "nome" => $row->nome, "mimeType" => $row->mimeType, "extensao" => $row->extensao, "numeroOcorrencias" => $row->numeroOcorrencias);
	    }

	    $resultado = array("midias" => $midias);
	    $resultado = (object) $resultado;
	    return response()->json($resultado);
	}

}
