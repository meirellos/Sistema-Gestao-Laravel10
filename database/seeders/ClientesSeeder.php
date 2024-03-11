<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cliente::create(
            [
                'nome' => 'Vinicius',
                'email' => 'vinmeirellos@gmail.com',
                'endereco' => 'Rua Ory',
                'logradouro' => 'logradouro x',
                'cep' => '1234567',
                'bairro' => 'Alto Paraiso'
            ]
        );
        Cliente::create(
            [
                'nome' => 'Mari',
                'email' => 'teste@gmail.com',
                'endereco' => 'Rua x',
                'logradouro' => 'logradouro x',
                'cep' => '1234567',
                'bairro' => 'Alto x'
            ]
        );
    }
}
