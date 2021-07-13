<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){

        if(Auth::attempt(
                [
                    'email' => $request->email,
                    'password' => $request->password,               ]
                , $request->has('remember')
                )){
               //return redirect()->intended('mensajes');
                 return redirect('home');
            }

            else{
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required',
                ];

                $messages = [
                    'email.required' => 'El campo email es requerido',
                    'email.email' => 'El formato de email es incorrecto',
                    'password.required' => 'El campo password es requerido',
                ];

                $validator = Validator::make($request->all(), $rules, $messages);

                return redirect('/login')
                ->withErrors($validator)
                ->withInput()
                ->with('message', 'Error al iniciar sesión');
            }
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('home');
    }
}