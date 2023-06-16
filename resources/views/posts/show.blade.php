@extends('layouts.app')

@section('titulo')
    {{ $post->titulo }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Post {{$post->titulo}} Image">

            <div class="p-3 flex items-center gap-2">

                @auth
                    <livewire:like-post :post="$post" />
                @endauth

            </div>

            <div>
                <p class="font-bold">{{ $post->user->username }}</p>
                <p class="text-sm text-gray-500">
                    {{$post->created_at->diffForHumans()}}
                </p>
                <p class="mt-5">
                    {{$post->descripcion}}
                </p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form action="{{route('posts.destroy', $post)}}" method="POST">
                        @method('DELETE') <!-- Spoofing method Laravel (Eliminar o Actualizar registros) -->
                        @csrf
                            <input 
                                type="submit"
                                value="Delete Post"
                                class="bg-red-500 hover:bg-red-600 rounded text-white font-bold mt-4 cursor-pointer p-2"
                            >
                    </form>
                @endif          
            @endauth

        </div>

        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">

                @auth
                    
                <p class="text-xl font-bold text-center mb-4">Add a new comment</p>

                @if (session('message'))
                    <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                        {{session('message')}}
                    </div>
                @endif

                <form action="{{ route('comentarios.store', ['post' => $post , 'user' => $user ]) }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comentario" class="mb-2 text-sm block uppercase text-gray-500 font-bold">
                            Share your thoughts!
                        </label>
                        <textarea id="comentario" name="comentario" placeholder="Write something" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"></textarea>
                            <!-- value=" old('name')" toma en cuenta el name="name" del input -->
                            
                        @error('comentario')
                            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <input 
                        type="submit"
                        value="Comment"
                        class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                    >
                </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    @if ($post->comentarios->count())
                        @foreach ($post->comentarios as $comentario)

                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route('posts.index', $comentario->user) }}" class="font-bold">
                                    {{$comentario->user->username}}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>

                        @endforeach
                    @else
                    <div class="flex justify-center gap-2 text-gray-400 p-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                        </svg>
                        <p class="text-center">No comments yet</p>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection