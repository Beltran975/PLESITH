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

        $user1=User::create([
            'name' => 'bothi',
            'email' => 'bothi@gmail.com',
            'curp' => 'KLHSK343VDD',
            'institucion' => 'UTVM',
            'programa' => 'tics',
            'password' => Hash::make('12345678'),
            'archivoCurp' => '',
            'image_path' => '',
            'tipo' => '',
            'fullacces' => 'no',
            'codigo' => 'casa1'
        ]);
    }
}
