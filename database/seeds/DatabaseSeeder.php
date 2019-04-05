<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        Model::unguard();

        //$this->call(DeputadosSeed::class);
        //$this->call(Verbas_IndenizatoriasSeed::class);
        $this->call(MidiasSeed::class);

        Model::reguard();
    }
}
