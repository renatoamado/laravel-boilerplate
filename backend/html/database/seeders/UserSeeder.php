<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'administrador@sicredi.com.br',
            'password' => Hash::make('sicredi@'),
            // 'auth_local' => 1,
            // 'permissoes' => json_encode(['0101_plataforma_admin'])
        ]);
    }
}
