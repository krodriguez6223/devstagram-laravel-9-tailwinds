@extends('layouts.app')

@section('titulo')
  
@endsection

@section('contenido')


    <div class="md:flex md:justify-center md:gap-5 md:items-center md:p-20">
        <div class="md:w-4/12  p-10">
            <img class="w-120" src="{{ asset('img/login.svg')}}" alt="imagen login de usuario">
        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="post" action="{{ route('login')}}" novalidate>
                @csrf

                @if (session('mensaje'))

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
   
                @endif

                <div class="mb-5">
                    <label for="email" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input id="email"
                           name="email"
                           type="email"
                           placeholder="Tu correo electronico"
                           class="border p-3 w-full rounded-lg  @error('email') border-red-500 @enderror"
                           value={{ old('email')}}>

                           @error('email')
                           <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                               
                           @enderror
                </div>
                <div class="mb-5">
                    <label for="password"  class="mb-2 block uppercase text-gray-500 font-bold">
                        Password
                    </label>
                    <input id="password"
                           name="password"
                           type="password"
                           placeholder="Ingresa tu contraseña"
                           class="border p-3 w-full rounded-lg  @error('password') border-red-500 @enderror"
                           >

                           @error('password')
                           <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                           @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remenber">
                    <label class="text-gray-500 text-sm">Mantener sesión abierta</label>
                </div>

                <input type="submit"
                       value="Iniciar sesion"
                       class="bg-sky-600 hover:bg-sky-700
                              transition-colors cursor-pointer
                              uppercase font-bold w-full
                              p-3 text-white rounded-lg
                              ">
              
            </form>
        </div>
    </div>
@endsection
