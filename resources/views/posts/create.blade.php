@extends('layouts.app')


@section('titulo')
Crea una nueva publicación

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />  
@endpush

@push('script')
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> 

@endpush


@section('contenido') 

    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
              
            <form action="{{ route('imagenes.store')}}"
                  method="POST"
                  enctype="multipart/form-data"
                  id="dropzone"
                  class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
       
        <div class="md:w-1/2 px-10 mt-10">
            <form action="{{ route('posts.store')}}" method="post" novalidate>
                @csrf

                <div class="mb-5">
                    <label for="titulo" for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                           id="titulo"
                           name="titulo"
                           type="text"
                           placeholder="Titulo de la publicación"
                           class="border p-3 w-full rounded-lg  @error('titulo') border-red-500 @enderror"
                           value="{{ old('titulo')}}">
                         
                           @error('titulo')
                           <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                           text-center">{{ $message }}</p>
                               
                           @enderror
                           
                </div>
                <div class="mb-5">
                    <label  for="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción
                    </label>
                    <textarea 
                           id="descripcion"
                           name="descripcion"
                           type="text"
                           value= ""
                           placeholder="Descripción de la publicación..."
                           class="border p-3 w-full rounded-lg  @error('descripcion') border-red-500 @enderror"
                            >{{ old('descripcion')}}</textarea>
                         
                           @error('descripcion')
                           <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                           text-center">{{ $message }}</p>
                               
                           @enderror
                           
                </div>
                <div class="mb-5">
                    <input type="hidden"
                            value="{{old('imagen')}}"
                           name="imagen"/>
                    @error('imagen')
                    
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 
                    text-center">{{ $message }}</p>
                        
                    @enderror

                </div>

                <input type="submit"
                       value="Publicar"
                       class="bg-sky-600 hover:bg-sky-700
                              transition-colors cursor-pointer
                              uppercase font-bold w-full
                              p-3 text-white rounded-lg
                              ">
              
            </form>
        </div>
    </div>
       
@endsection