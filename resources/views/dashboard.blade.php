@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username}} 
@endsection

@section('contenido')


<div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
        <div class="w-8/12 lg:w-6/12 px-5 ">
            <img class="rounded-full" src="{{ $user->imagen ?
                                             asset('perfiles/') . '/' .$user->imagen :
                                             asset('img/usuario.svg')}}"
                                             alt="login-usuario">
        </div>
        <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10 md:py-10">
           <div class="flex items-center gap-2">
            <p class="text-gray-700 text-2xl">{{ $user->username }}</p>
            @auth
                @if ($user->id === auth()->user()->id)
                    
                <a href="{{ route('perfil.index')}}" class="flex items-center gap-2 bg-grey border p-2 text-gray-600 rounded text-sm  font-bold hover:text-white-600 cursor-pointer">
                    Editar perfil
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                    </svg>
                    
                </a>
                
                @endif
            @endauth
        </div>      

            <p class="text-gray-800 text-lg mb-3 font-bold mt-5">
                {{ $user->followers->count() }}
                
                <span class="font-normal"> @choice('seguidor|seguidores',  $user->followers->count())</span>
            </p>
            <p class="text-gray-800 text-lg mb-3 font-bold">
                {{ $user->followings->count() }}
                <span class="font-normal">siguiendo</span>
            </p>
            <p class="text-gray-800 text-lg mb-3 font-bold">
               {{ $user->posts->count() }}
                <span class="font-normal">publicaciones</span> 
            </p>
            @auth
                
            @if ($user->id !== auth()->user()->id)
                    @if ( !$user->siguiendo( auth()->user()))
                     
                        <form action="{{ route('users.follow', $user)}}" method="POST">
                            @csrf 
                            <input 
                            type="submit"
                            value="Seguir" 
                            class="text-white rounded-lg px-3 py-1 text-xs font-bold bg-sky-600 hover:bg-sky-700
                            transition-colors cursor-pointer
                            ">
                        </form>
                    @else
                        <form action="{{ route('users.unfollow', $user)}}" method="POST">
                            @csrf
                            @method('DELETE')  
                            <input 
                            type="submit"
                            value="Dejar de seguir" 
                            class="text-white rounded-lg px-3 py-1 text-xs font-bold bg-gray-600 hover:bg-gray-700
                            transition-colors cursor-pointer
                            ">
                        </form>
                    @endif   
                @endif
            @endauth
        </div>
    </div>
</div>

<section class="container mx-auto mt-10">
    <h2 class="text-4xl text-center font-bold my-10">Publicaciones</h2>
    
    <x-listar-post :posts="$posts" />

</section>

@endsection

