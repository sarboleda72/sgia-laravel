<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usando ORM 
        $user = new User();
        $user->nombre_completo = 'Santiago Arboleda';
        $user->tipo_documento = 'CC';
        $user->documento = '123456789';
        $user->ficha_id = "231314";
        $user->rol = 'admin';
        $user->estado = 'activo';
        $user->email = 'sarboleda72@misena.edu.co';
        $user->password = bcrypt('123456789');
        $user->save();
        
    }
}
