<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public static function index() 
    {
        return view('auth.register');
    }

    public function store(Request $request) 
    {
        // Die & Dumb Function (to Debug)
        // dd($request);
        // dd($request->get('email'));

        // Modificar el request
        $request->request->add(['username' => Str::slug($request->username)]);

        // Validación
        $this->validate($request, [
            'name' => 'required|max:20',
            'username' => 'required|unique:users|min:3|max:20',
            'email' => 'required|unique:users|email|max:30',
            'password' => 'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ]);

        // Autenticar usuario
        // auth()->attempt([
        //     'email' => $request->email,
        //     'password' => $request->password 
        // ]);

        // Otra forma de autenticar 
        auth()->attempt($request->only('email', 'password'));

        // Redireccionar usuario
        return redirect()->route('posts.index', auth()->user()->username);
    }
}
