<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function __construct()
    {
       $this->middleware('auth', ['except' => ['create', 'store']]);
       $this->middleware('soloadmin', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'rol' => 'required',
            'password' =>'required|min:3'
        ],
        [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'phone' => 'El campo teléfono es requerido',
            'rol.required' => 'El campo rol es requerido',
            'password.required' => 'El campo contraseña es requerido',
            'password.min:8' => 'La contraseña debe tener al menos 8 carácteres',
        ]);

         DB::table('users')->insert([
            'name' => $request['name'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
            'state' => $request['state'],
            'cp' => $request['cp'],
            'password' => bcrypt($request['password']),
            'rol' => $request['rol'],
         ]);

        return redirect()->route('users.create')->with('info', 'Gracias por registrarte en GamingShop, puedes iniciar sesion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $total_purchases = 0;
        foreach ($user->sales as $key =>  $sale) {
            $total_purchases+=$sale->total;
        }
        $total_amount_sold = 0;
        foreach ($user->purchases as $key =>  $purchase) {
            $total_amount_sold+=$purchase->total;
        }
        return view('admin.user.show', compact('user', 'total_purchases', 'total_amount_sold'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $users = User::get();
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
        ],
        [
            'name.required' => 'El campo nombre es requerido',
            'lastname.required' => 'El campo apellido es requerido',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El formato de email es incorrecto',
            'phone.required' => 'El número teléfonico es requerido',
            'password' => 'La contraseña es requerida'
        ]);

        $user->update($request->all());

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('users.index');
    }
}
