@extends('layouts.app')

@section('titulo')
    Edit Profile: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        id="username"
                        type="text"
                        name="username"
                        placeholder="Your username"
                        class="border p-3 w-full rounded-lg 
                        @error('username')
                            border-red-500
                        @enderror"
                            value="{{ auth()->user()->username}}" 
                        >
                        <!-- value=" old('name')" toma en cuenta el name="name" del input -->
                        
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Profile Picture
                    </label>
                    <input 
                        id="imagen"
                        type="file"
                        name="imagen"
                        class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png"
                        >
                </div>

                <input 
                type="submit"
                value="Save Changes"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection