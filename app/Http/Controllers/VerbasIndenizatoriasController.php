<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VerbasIndenizatorias;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class VerbasIndenizatoriasController extends Controller {
    
    public function index() {
      
        $resultado = array();
        for ($mes = 1; $mes <= 12; $mes++) { 
            $list = DB::select('SELECT idDeputado, (SELECT nome FROM deputados WHERE id = idDeputado) AS nome, (SELECT partido FROM deputados WHERE id = idDeputado) AS partido, SUM(valorReembolsado) AS totalReembolso FROM verbas_indenizatorias WHERE MONTH(dataReferencia) = :mes GROUP BY idDeputado ORDER BY totalReembolso DESC LIMIT 5', ['mes' 
        		=> $mes]);
            
            $deputados = array();
     
            foreach ($list as $row) {
                $deputados[] = array("idDeputado" => $row->idDeputado, "nome" => $row->nome, "partido" => $row->partido, "totalReembolso" => $row->totalReembolso);
            }

        	$resultado[] = array("dataReferencia" => '2017-'.$mes.'-01', "deputados" => $deputados);
        }
        //$resultado = json_encode($resultado);
        return response()->json($resultado);
    }
}
