<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasIndenizatoriasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('verbas_indenizatorias', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('idDeputado');
            $table->date('dataReferencia');
            $table->decimal('valorReembolsado', 10, 2);
            $table->date('dataEmissao');
            $table->string('cpfCnpj', 14);
            $table->decimal('valorDespesa', 10, 2);
            $table->string('nomeEmitente');
            $table->string('descDocumento')->nullable();
            $table->integer('codTipoDespesa');
            $table->string('descTipoDespesa');

            $table->foreign('idDeputado')
                ->references('id')
                ->on('deputados')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('verbas_indenizatorias');
    }
}
