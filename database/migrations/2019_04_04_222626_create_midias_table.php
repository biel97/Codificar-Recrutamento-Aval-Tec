<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMidiasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('midias', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('nome');
            $table->string('mimeType');
            $table->string('extensao');
            $table->integer('numeroOcorrencias');
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
        Schema::dropIfExists('midias');
    }
}
