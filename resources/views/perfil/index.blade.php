@extends('layouts.app')

@section('titulo')

   Editar perfil: {{ auth()->user()->username }}

@endsection

@section('contenido')


<div class="md:flex md:justify-center ">
    <div class="md:w-1/2 bg-white shadow p-6 rounded-lg">

        <form action="{{ route('perfil.store')}}" method="POST" novalidate enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
         
            <div class="mb-5">
                <label for="username" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input id="username"
                       name="username"
                       type="text"
                       placeholder="Tu nombre de usuario"
                       class="border p-3 w-full rounded-lg  @error('username') border-red-500 @enderror"
                       value={{ auth()->user()->username }}>

                       @error('username')
                       <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                       @enderror
                       
                       
                    </div>
                    <div class="mb-5">
                        <label for="email" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                            Email
                        </label>
                        <input id="email"
                               name="email"
                               type="email"
                               placeholder="Tu correo electronico"
                               class="border p-3 w-full rounded-lg  @error('email') border-red-500 @enderror"
                               value={{ auth()->user()->email }}>
        
                               @error('email')
                               <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                               @enderror
                               
                               
                    </div>
                    <div class="mb-5">
                        <label for="password" for="name" class="mb-2 block uppercase text-gray-500 font-bold">
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
                    @if (session('mensaje'))

                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
        
                    @endif
            <div class="mb-5">
                <label for="newPass"  class="mb-2 block uppercase text-gray-500 font-bold">
                    Nueva contraseña
                </label>
                <input id="newPass"
                       name="newPass"
                       type="password"
                       placeholder="Contraseña nueva"
                       class="border p-3 w-full rounded-lg  @error('newPass') border-red-500 @enderror" >
                       @error('newPass')
                       <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                       @enderror
                       
                       
            </div>
           
            <div class="mb-5">
                <label  for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                    Imagen Perfil
                </label>
                <input 
                       id="imagen"
                       name="imagen"
                       type="file"
                       accept=".jpg, .jpeg, .png"
                       value=""
                       class="border p-3 w-full rounded-lg">
                     
                       
                       
            </div>
            <input type="submit"
                       value="Actualizar perfil"
                       class="bg-sky-600 hover:bg-sky-700
                              transition-colors cursor-pointer
                              uppercase font-bold w-full
                              p-3 text-white rounded-lg
                              ">
        </form>

    </div>

</div>
    
@endsection