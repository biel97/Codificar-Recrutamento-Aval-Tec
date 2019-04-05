<?php

use Illuminate\Database\Seeder;

class DeputadosSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $json_file = file_get_contents("http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json");
  		$dados = json_decode($json_file);

  		for ($i=0; $i < sizeof($dados->list); $i++) {
  			App\Models\Deputados::create([
  				'id' => $dados->list[$i]->id,
	  			'nome' => $dados->list[$i]->nome,
	  			'partido' => $dados->list[$i]->partido,
	  			'tagLocalizacao' => $dados->list[$i]->tagLocalizacao,
	  		]);
  		}
    }
}
