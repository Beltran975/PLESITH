<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $useradmin=User::create([
            'name' => 'admin PLESITH',
            'email' => 'admin@admin.com',
            'curp' => '',
            'institucion' => '',
            'programa' => '',
            'password' => Hash::make('admin'),
            'archivoCurp' => '',
            'image_path' => '',
            'tipo' => '',
            'fullacces' => 'yes',
            'codigo' => 'adm1'
        ]);
    }

}
