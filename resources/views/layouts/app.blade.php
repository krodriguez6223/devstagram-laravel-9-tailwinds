<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>DevStagram | @yield('titulo') </title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @stack('styles')
        @stack('script')
       
        <script src="{{ asset('js/app.js') }}"defer></script>
        @livewireStyles
       
    </head>
   <body class="bg-gray-100">
       <header class="p-3 border-b bg-white shadow fixed top-0 left-0 right-0">
           <div class="container mx-auto flex justify-between">
                <a href=" {{ route('home')}}" class="text-3xl font-black">
                    <img src="{{ asset('img/logo_header.png') }}" style=" width: 160px;">
                </a>
                    
                @auth
                        <nav class="flex gap-2 items-center">
                            {{-- Boton de usurios --}}
                            <a href="{{ route('posts.index', auth()->user()->username)}}"  
                                class="font-bold  text-gray-600">Hola: 
                                <span class="font-normal hover:text-blue-600 cursor-pointer">{{ auth()->user()->username}}</span>
                            </a>
                                <img class="rounded-full w-9" src="{{  auth()->user()->imagen ?
                                    asset('perfiles/') . '/' . auth()->user()->imagen :
                                    asset('img/usuario.svg')}}"
                                    alt="login-usuario">
                            
                            {{-- Boton de crear --}}
                            <a href="{{ route('posts.create')}}"
                                class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold hover:text-blue-600 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                                    />
                                </svg>
                                 Crear
                             </a>
                        
                            {{-- Boton de incio --}}
                            <a href="{{ route('home')}}" 
                               class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold hover:text-blue-600 cursor-pointer">
                             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                             </svg>
                            </a>
                            {{-- Boton de notificaciones --}}
                            <a href="{{ route('home')}}" 
                               class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold hover:text-blue-600 cursor-pointer">
                               <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                              </svg>
                            </a>

                            <form  method="POST" action="{{route('logout')}}" >
                            @csrf
                                
                                <button type="submit"
                                        class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm uppercase font-bold hover:text-blue-600 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                </button>
                            </form>
                                
                        </nav>

                @endauth

                @guest
                        <nav class="flex gap-2 items-center">

                            <a class="font-bold uppercase text-gray-600" href="/login">Login |</a>
                            <a  href="{{ route('register')}}" class="font-bold uppercase text-gray-600">Crear cuenta</a>

                        </nav>
                @endguest

           </div>
       </header>
       <main class="container mx-auto mt-10  md:p-20 rounded-lg ">
         
        <h2 class="font-bold text-center text-2xl mb-10">
               @yield('titulo')
           </h2>
               @yield('contenido') 
            

       </main>

       <footer class="text-center p-2 text-gray-500 font-bold bg-white mt-10 shadow ">
           DevStagram - todos los derechos reservados 
           {{ now()->year }}
      </footer>
      
      @livewireScripts
    </body>
</html>
