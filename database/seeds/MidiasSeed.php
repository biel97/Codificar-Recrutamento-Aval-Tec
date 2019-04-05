<?php

use Illuminate\Database\Seeder;

class MidiasSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 1; $i <= 15; $i+=1){
	        $json_file = file_get_contents("http://dadosabertos.almg.gov.br/ws/midias/pesquisa?tipo=".$i."&formato=json");
	  		$dados = json_decode($json_file);

	  		$resultadoPesquisa = (array) $dados->resultadoPesquisa;
	  		if($resultadoPesquisa['numeroOcorrencias'] != 0) {
		  		$lista = $resultadoPesquisa['lista'];
				$tipo = (array) $lista[0]->tipo;

		  		App\Models\Midias::create([
		  			'id' => $tipo['id'],
			  		'nome' => $tipo['nome'],
			  		'mimeType' => $tipo['mimeType'],
			  		'extensao' => $tipo['extensao'],
			  		'numeroOcorrencias' => $resultadoPesquisa['numeroOcorrencias'],
			  	]);
				
	  		}
    	}
    }   
}
