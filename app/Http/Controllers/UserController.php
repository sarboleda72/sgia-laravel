<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users= User::all();
        return view('users.index')->with('users', $users);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        //
        //dd($request->all());
        // crear con ORM

        $user= new User();
        $user->nombre_completo = $request->nombre_completo;
        $user->tipo_documento = $request->tipo_documento;
        $user->documento = $request->documento;
        $user->ficha_id = $request->ficha_id;
        $user->rol = $request->rol;
        $user->estado = $request->estado;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return redirect('users')->with('message', 'El usuario '.$user->nombre_completo .' fue creado con éxito');
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
        //return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        $user->nombre_completo = $request->nombre_completo;
        $user->tipo_documento = $request->tipo_documento;
        $user->documento = $request->documento;
        $user->ficha_id = $request->ficha_id;
        $user->rol = $request->rol;
        $user->estado = $request->estado;
        $user->email = $request->email;

        if($user->save()){
            return redirect('users')->with('message', 'El usuario '.$user->nombre_completo .' fue actualizado con éxito');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if($user->delete()){
            return redirect('users')->with('message', 'El usuario '.$user->nombre_completo .' fue eliminado con éxito');
        }
    }

    public function search(Request $request){
        $users = User::names($request->q)->get();
        return view('users.search')->with('users', $users);
    }
}
