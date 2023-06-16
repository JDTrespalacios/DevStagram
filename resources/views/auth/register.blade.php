@extends('layouts.app')

@section('titulo')
    Sign Up Now
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-1/2 p-5">
            <img src="{{ asset('img/registrar.jpg')}}" alt="Users sign-up image">
        </div>

        <div class="md:w-1/3 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register')}}" method="POST">
                <!-- Generates security token (csrf) -->
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Name
                    </label>
                    <input 
                        id="name"
                        type="text"
                        name="name"
                        placeholder="Your name"
                        class="border p-3 w-full rounded-lg 
                        @error('name')
                            border-red-500
                        @enderror"
                            value="{{ old('name')}}" 
                        >
                        <!-- value=" old('name')" toma en cuenta el name="name" del input -->
                        
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Username
                    </label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Your username"
                        class="border p-3 w-full rounded-lg
                        @error('username')
                            border-red-500
                        @enderror"
                        value="{{ old('username')}}" 
                    >

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Email
                    </label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Your email"
                        class="border p-3 w-full rounded-lg 
                        @error('email')
                        border-red-500
                        @enderror"
                        value="{{ old('email')}}" 
                    >

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Password
                    </label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Your password"
                        class="border p-3 w-full rounded-lg 
                        @error('password')
                        border-red-500
                        @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold" >
                        Repeat Password
                    </label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repeat password"
                        class="border p-3 w-full rounded-lg "
                    >
                </div>
                
                <input 
                    type="submit"
                    value="Create Account"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
