<?php

use Illuminate\Database\Seeder;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Cliente::class, 10)
            ->create()
            ->each(function($cliente) {
                $cliente->documento()->save(factory(App\Models\Documento::class)->make());
            });
    }
}
