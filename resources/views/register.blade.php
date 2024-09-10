@extends('layouts.app')
@section('title', 'Register')
@section('classMain', 'register')

@section('content')

    <form method="POST" action="{{ route('register') }}">
        @csrf

  
            <label for="nombre_completo">Nombre completo</label>
            <input type="text" name="nombre_completo" placeholder="Cris Valencia">

            <label for="">Tipo de documento</label>

            <select name="tipo_documento" >
                <option value="CC">CC</option>
                <option value="TI">TI</option>
                <option value="CE">CE</option>
            </select>

            <label for="documento">Documento</label>
            <input type="text" name="documento" placeholder="1099999999">


            <label for="ficha_id">Ficha ID</label>
            <input type="text" name="ficha_id" placeholder="2330934">



            <select name="rol"  hidden>
                <option value="Aprendiz">Aprendiz</option>
                <option value="Instructor">Instructor</option>
                <option value="Administrador">Administrador</option>
            </select>



            <select name="estado"  hidden>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
            </select>



        <!-- Email Address -->

            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autocomplete="username" placeholder="micorreo@dominio.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />


        <!-- Password -->

            <x-input-label for="password" :value="__('Cotraseña')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />


        <!-- Confirm Password -->

            <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('¿Ya estas registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>

    </form>

@endsection

@section('js')
@endsection
