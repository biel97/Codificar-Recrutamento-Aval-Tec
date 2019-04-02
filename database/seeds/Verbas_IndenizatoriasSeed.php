<?php

use Illuminate\Database\Seeder;

class Verbas_IndenizatoriasSeed extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $json_file = file_get_contents("http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio?formato=json");
  		$deputados = json_decode($json_file);

  		for ($i=0; $i < sizeof($deputados->list); $i++) {
  			for ($j=1; $j<=12; $j++){
  				$json_file = file_get_contents("http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/".$deputados->list[$i]->id."/2017/".$j."?formato=json");
  				$dados = json_decode($json_file);
  				
  				for ($x=0; $x < sizeof($dados->list); $x++) { 
  					for ($z=0; $z < sizeof($dados->list[$x]->listaDetalheVerba); $z++) {
              $dateRef = (array) $dados->list[$x]->listaDetalheVerba[$z]->dataReferencia;

              $dateRef = $dateRef['$'];
             
              $dateEmi = (array) $dados->list[$x]->listaDetalheVerba[$z]->dataEmissao;

              $dateEmi = $dateEmi['$'];
              
              $descDocumento = null;
              if (isset($dados->list[$x]->listaDetalheVerba[$z]->descDocumento)) {
                $descDocumento = $dados->list[$x]->listaDetalheVerba[$z]->descDocumento;
              }

  						App\Models\Verbas_Indenizatorias::create([
  							'id' => $dados->list[$x]->listaDetalheVerba[$z]->id,
  	  					'idDeputado' => $dados->list[$x]->listaDetalheVerba[$z]->idDeputado,
  	  					'dataReferencia' => $dateRef,
  	  					'valorReembolsado' => $dados->list[$x]->listaDetalheVerba[$z]->valorReembolsado,
  	  					'dataEmissao' => $dateEmi,
  	  					'cpfCnpj' => $dados->list[$x]->listaDetalheVerba[$z]->cpfCnpj,
  	  					'valorDespesa' => $dados->list[$x]->listaDetalheVerba[$z]->valorDespesa,
  	  					'nomeEmitente' => $dados->list[$x]->listaDetalheVerba[$z]->nomeEmitente,
  	  					'descDocumento' => $descDocumento,
  	  					'codTipoDespesa' => $dados->list[$x]->listaDetalheVerba[$z]->codTipoDespesa,
  	  					'descTipoDespesa' => $dados->list[$x]->listaDetalheVerba[$z]->descTipoDespesa,
  						]);
  					}
  				}
  			}
  		}    
  	}
}
