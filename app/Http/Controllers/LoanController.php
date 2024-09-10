<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use App\Models\User;
use App\Models\Tool;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loans= Loan::with(['user', 'tool'])->get();
        $users= User::all();
        $tools= Tool::all();
        return view('loans.index')->with(['loans'=> $loans, 'users'=> $users, 'tools'=> $tools]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoanRequest $request)
    {
        //
        $loan= new Loan();
        $loan->fecha_prestamo = date('Y-m-d H:i:s');
        $loan->user_id = $request->user_id;
        $loan->tool_id = $request->tool_id;
        $loan->estado = $request->estado;

        if($loan->save()){
            return redirect('loans')->with('message', 'El préstamo fue creado con éxito');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LoanRequest $request, Loan $loan)
    {
        //

        $loan->fecha_fin = date('Y-m-d H:i:s');
        $loan->fecha_devolucion = date('Y-m-d H:i:s');
        $loan->estado = $request->estado;

        if($loan->save()){
            return redirect('loans')->with('message', 'El préstamo fue actualizado con éxito');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        if(Loan::destroy($id)){
            return redirect('loans')->with('message', 'El préstamo fue eliminado con éxito');
        }
    }

    public function search(Request $request)
    {
        $loans= Loan::names($request->q)->get();
        return view('loans.search')->with('loans', $loans);
    }
}
