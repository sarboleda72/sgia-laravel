@extends('layouts.app')
@section('title', 'Login')
@section('classMain', 'login')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-box">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1>Inicio de sesión</h1>

            <!-- Email Address -->

                <x-input-label for="email" :value="__('')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" placeholder="Correo electrónico"/>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />


            <!-- Password -->

                <x-input-label for="password" :value="__('')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" placeholder="Contraseña"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />


            <!-- Remember Me -->

                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                        name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>



                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Olvidó su contraseña?') }}
                    </a>
                @endif

                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('register') }}">
                        {{ __('Registrarse') }}
                    </a>


                <x-primary-button class="btn">
                    {{ __('Iniciar sesión') }}
                </x-primary-button>

        </form>

    </div>



@endsection

@section('js')
@endsection
