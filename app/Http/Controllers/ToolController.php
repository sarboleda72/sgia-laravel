<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tool;
use App\Http\Requests\ToolRequest;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tools= Tool::all();
        return view('tools.index')->with('tools', $tools);
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
    public function store(ToolRequest $request)
    {
        //

        $tool= new Tool();
        $tool->nombre = $request->nombre;
        $tool->marca = $request->marca;
        $tool->cantidad = $request->cantidad;
        $tool->precio = $request->precio;
        $tool->estado = $request->estado;

        if($tool->save()){
            return redirect('tools')->with('message', 'La herramienta '.$tool->nombre .' fue creada con éxito');
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
    public function update(ToolRequest $request, Tool $tool)
    {
        //
        $tool->nombre = $request->nombre;
        $tool->marca = $request->marca;
        $tool->cantidad = $request->cantidad;
        $tool->precio = $request->precio;
        $tool->estado = $request->estado;

        if($tool->save()){
            return redirect('tools')->with('message', 'La herramienta '.$tool->nombre .' fue actualizada con éxito');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        //
        if($tool->delete()){
            return redirect('tools')->with('message', 'La herramienta '.$tool->nombre .' fue eliminada con éxito');
        }
    }

    public function search(Request $request){
        $tools = Tool::names($request->q)->get();
        return view('tools.search')->with('tools', $tools);
    }
}
