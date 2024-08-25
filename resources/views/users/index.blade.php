@extends('layouts.dashboard')
@section('nameModule', 'Usuarios')

@section('content')
    <div class="user-cards">

        @foreach ($users as $user)
            <div class="user-card">
                <div class="user-card-content">
                    <h3>Nombre completo: {{ $user->nombre_completo }} </h3>
                    <p>Tipo de documento: {{ $user->tipo_documento }}</p>
                    <p>Documento: {{ $user->documento }}</p>
                    <p>Ficha ID: {{ $user->ficha_id }}</p>
                    <p>Rol: {{ $user->rol }}</p>
                    <p>Estado: {{ $user->estado }}</p>
                    <p>Email: {{ $user->email }}</p>
                    <p hidden>id: {{$user->id}}</p>
                </div>
                <div class="user-card-actions">
                    <button class="edit-btn">Editar</button>
                    <button class="delete-btn">Eliminar</button>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('formCreate')
    <form method="POST" id="crearForm" action="{{ route('users.store')}}">
        @csrf
        <label for="nombre_completo">Nombre completo:</label>
        <input type="text" id="nombre_completo" name="nombre_completo" required>

        <div>
            <label for="tipo_documento">Tipo de documento:</label>
            <select id="tipo_documento" name="tipo_documento" required>
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="CE">CE</option>
            </select>
        </div>


        <label for="documento">Documento:</label>
        <input type="text" id="documento" name="documento" required>

        <label for="ficha_id">Ficha ID:</label>
        <input type="text" id="ficha_id" name="ficha_id" required>

        <div>
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Aprendiz">Aprendiz</option>
                <option value="Instructor">Instructor</option>
                <option value="Administrador">Administrador</option>
            </select>

        </div>

        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="Activo">Activo</option>
            <option value="Inactivo">Inactivo</option>
        </select>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <button type="submit" class="btn">Guardar cambios</button>
    </form>
@endsection

@section('formEdit')
    <form method="POST" id="editForm" action="" data-action-base="{{ url('users/')}}">
        @csrf
        @method('PUT')

        <input type="hidden" id="edit_id" name="id" value="">

        <div>
            <label for="edit_nombre_completo">Nombre completo</label>
            <input type="text" id="edit_nombre_completo" name="nombre_completo">
        </div>

        <div>
            <label for="edit_tipo_documento">Tipo de documento</label>
            <select id="edit_tipo_documento" name="tipo_documento">
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="CE">CE</option>
            </select>
        </div>

        <div>
            <label for="edit_documento">Documento</label>
            <input type="text" id="edit_documento" name="documento">
        </div>

        <div>
            <label for="edit_ficha_id">Ficha ID</label>
            <input type="text" id="edit_ficha_id" name="ficha_id">
        </div>

        <div>
            <label for="edit_rol">Rol</label>
            <select id="edit_rol" name="rol">
                <option value="user">Aprendiz</option>
                <option value="instructor">Instructor</option>
                <option value="admin">Administrador</option>
            </select>
        </div>

        <div>
            <label for="edit_estado">Estado</label>
            <select id="edit_estado" name="estado">
                <option value="activo">Activo</option>
                <option value="inactivo">Inactivo</option>
            </select>
        </div>


        <div>
            <label for="edit_email">Email</label>
            <input type="email" id="edit_email" name="email">
        </div>

        <div class="modal-actions">
            <button type="submit" class="save-btn">Guardar</button>
            <button type="button" class="cancel-btn">Cancelar</button>
        </div>
    </form>
@endsection
