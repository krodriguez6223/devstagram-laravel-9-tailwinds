<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index()
     {
        return view('auth/register');
    }
    public function store(Request $request)
     {
      // Modificar Request
      $request->request->add(['username' => Str::slug($request->username)]);

      //validate
      $this->validate($request, [
          'name' => 'required|max:30',
          'username' => 'required|unique:users|min:3|max:20',
          'email' => 'required|unique:users|email|max:60',
          'password' => 'required|min:6|confirmed'
      ]);

      User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)

      ]);
      //Autenticar
     /* auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
      ]);*/
      
      //otra forma de autenticar
      auth()->attempt($request->only('email', 'password'));

      //redireccionar
      return redirect()->route('posts.index');
      
    
    }
 
}