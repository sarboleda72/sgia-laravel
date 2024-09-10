<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\User;
use App\Models\Tool;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user= User::first();
        $tool= Tool::first();

        $loan = new Loan();
        $loan->fecha_prestamo = '2021-09-07';
        $loan->fecha_fin = '2021-09-14';
        $loan->fecha_devolucion = '2021-09-14';
        $loan->estado = true;
        $loan->user_id = $user->id;
        $loan->tool_id = $tool->id; 
        $loan->save();

        $loan = new Loan();
        $loan->fecha_prestamo = '2023-09-07';
        $loan->estado = false;
        $loan->user_id = $user->id;
        $loan->tool_id = $tool->id;
        $loan->save();


    }
}
