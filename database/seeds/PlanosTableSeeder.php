<?php

use App\Models\Plano;
use Illuminate\Database\Seeder;

class PlanosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plano::create([
            'nome' => 'Free',
            'mensalidade' => '0.00',
        ]);
        Plano::create([
            'nome' => 'Basic',
            'mensalidade' => '100.00',
        ]);
        Plano::create([
            'nome' => 'Plus',
            'mensalidade' => '187.00',
        ]);

    }
}
