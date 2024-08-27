<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tool;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tool = new Tool();
        $tool->nombre = 'Martillo';
        $tool->marca = 'Stanley';
        $tool->cantidad = '10';
        $tool->precio = '50000';
        $tool->estado = 'activo';
        $tool->save(); 
        
        $tool = new Tool();
        $tool->nombre = 'Destornillador';
        $tool->marca = 'Stanley';
        $tool->cantidad = '10';
        $tool->precio = '50000';
        $tool->estado = 'activo';
        $tool->save();

        $tool = new Tool();
        $tool->nombre = 'Taladro';
        $tool->marca = 'Stanley';
        $tool->cantidad = '10';
        $tool->precio = '50000';
        $tool->estado = 'activo';
        $tool->save();
        
    }
}
