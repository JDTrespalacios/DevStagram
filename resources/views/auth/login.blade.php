@extends('layouts.app')

@section('titulo')
    Log In
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-1/2 p-5">
            <img src="{{ asset('img/login.jpg')}}" alt="Users sign-up image">
        </div>

        <div class="md:w-1/3 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('login')}}" method="POST">
                @csrf

                @if (session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2">{{ session('message') }}</p>
                @endif

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
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
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
                    <input type="checkbox" name="remember">
                    <label class="text-gray-500 text-sm">Stay signed-in</label> 
                </div>

                <input 
                    type="submit"
                    value="Sign In"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection
