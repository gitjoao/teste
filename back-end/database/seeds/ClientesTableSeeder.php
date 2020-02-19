<?php

use App\Models\Cliente;
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
        Cliente::create([
            'nome' => 'Claudianus Boast',
            'email' => 'cboast0@fastcompany.com',
            'contato' => '19957645371',
            'estado' => 'São Paulo ',
            'cidade' => 'Araraquara',
            'data-nascimento' => '07061993',
        ]);

        Cliente::create([
            'nome' => 'Loni Jennions',
            'email' => 'ljennions1@va.gov',
            'contato' => '19905613161',
            'estado' => 'São Paulo',
            'cidade' => 'Limeira',
            'data-nascimento' => '09051985',
        ]);

        Cliente::create([
            'nome' => 'Margi Gilhouley',
            'email' => 'mgilhouley2@telegraph.co.uk',
            'contato' => '19966290104',
            'estado' => 'São Paulo',
            'cidade' => 'Araraquara',
            'data-nascimento' => '13091984',
        ]);

        Cliente::create([
            'nome' => 'Lexy Sprulls',
            'email' => 'lsprulls3@moonfruit.com',
            'contato' => '19976121601',
            'estado' => 'São Paulo',
            'cidade' => 'Rio Claro',
            'data-nascimento' => '19101999',
        ]);

        Cliente::create([
            'nome' => 'Marie Shatliff',
            'email' => 'mshatliff4@cbslocal.com',
            'contato' => '19991376354',
            'estado' => 'São Paulo',
            'cidade' => 'Rio Claro',
            'data-nascimento' => '20071990',
        ]);

        Cliente::create([
            'nome' => 'Graig Mouncey',
            'email' => 'gmouncey5@so-net.ne.jp',
            'contato' => '19941806149',
            'estado' => 'São Paulo',
            'cidade' => 'Araraquara',
            'data-nascimento' => '27031990',
        ]);

        Cliente::create([
            'nome' => 'Laurice Liger',
            'email' => 'lliger0@php.net',
            'contato' => '35971740954',
            'estado' => 'Minas Gerais',
            'cidade' => 'Areado',
            'data-nascimento' => '25101992',
        ]);

        Cliente::create([
            'nome' => 'Kendrick Sooper',
            'email' => 'ksooper1@slate.com',
            'contato' => '31944324086',
            'estado' => 'Minas Gerais',
            'cidade' => 'Belo Horizonte',
            'data-nascimento' => '02061981',
        ]);

        Cliente::create([
            'nome' => 'Gordon Levington',
            'email' => 'glevington2@hpost.com',
            'contato' => '31922405868',
            'estado' => 'Minas Gerais',
            'cidade' => 'Belo Horizonte',
            'data-nascimento' => '25111993',
        ]);

        Cliente::create([
            'nome' => 'Noam Scolland',
            'email' => 'nscolland3@mozilla.org',
            'contato' => '35996817669',
            'estado' => 'Minas Gerais',
            'cidade' => 'Areado',
            'data-nascimento' => '31121999',
        ]);

        Cliente::create([
            'nome' => 'Lindon Skehens',
            'email' => 'lskehens4@npr.org',
            'contato' => '35967671104',
            'estado' => 'Minas Gerais',
            'cidade' => 'Areado',
            'data-nascimento' => '10011985',
        ]);

        Cliente::create([
            'nome' => 'Kimbra Rase',
            'email' => 'krase5@topsy.com',
            'contato' => '35999428030',
            'estado' => 'Minas Gerais',
            'cidade' => 'Areado',
            'data-nascimento' => '05051999',
        ]);
        Cliente::create([
            'nome' => 'Lorenzo Fisk',
            'email' => 'lfisk6@businessweek.com',
            'contato' => '31912695467',
            'estado' => 'Minas Gerais',
            'cidade' => 'Belo Horizonte',
            'data-nascimento' => '22121985',
        ]);

        Cliente::create([
            'nome' => 'Bourke Flavelle',
            'email' => 'bflavelle7@fc2.com',
            'contato' => '35959386145',
            'estado' => 'Minas Gerais',
            'cidade' => 'Itapeva',
            'data-nascimento' => '10041984',
        ]);

        Cliente::create([
            'nome' => 'Curran McSharry',
            'email' => 'cmcsharry8@webeden.co.uk',
            'contato' => '35902916131',
            'estado' => 'Minas Gerais',
            'cidade' => 'Itapeva',
            'data-nascimento' => '15011983',
        ]);

        Cliente::create([
            'nome' => 'Aveline Dowtry',
            'email' => 'adowtry9@miibeian.gov.cn',
            'contato' => '31945227500',
            'estado' => 'Minas Gerais',
            'cidade' => 'Belo Horizonte',
            'data-nascimento' => '23121994',
        ]);

        Cliente::create([
            'nome' => 'John Sebastian',
            'email' => 'jsebastiana@cbslocal.com',
            'contato' => '31907366740',
            'estado' => 'Minas Gerais',
            'cidade' => 'Belo Horizonte',
            'data-nascimento' => '06041998',
        ]);

        Cliente::create([
            'nome' => 'Reynolds Greenan',
            'email' => 'rgreenanb@bloomberg.com',
            'contato' => '35923551410',
            'estado' => 'Minas Gerais',
            'cidade' => 'Itapeva',
            'data-nascimento' => '19071985',
        ]);
    }
}
