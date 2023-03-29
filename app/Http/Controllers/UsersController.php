<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    ///listar Proveedor
    public function index()
    {
        //ORM Eloquent
        $users = User::all();
        //select * from providers
        //me retorna la información en formato json
        return view('users.index', compact('users'));
    }
    //crear
    // public function create()
    // {
    //     return view('providers.create');
    // }
    //(guardar datos y retornar proveedores)
    public function store(Request $request)
    {
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Producto creado correctamente');

        User::create($request->all());
        return redirect()->route('usuarios')->with('message', session('success'));
    }
    //Eliminar--> retorno vista proveedores
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios');
    }
    //mostrar detalles
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }
    //editar
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }
    //editar status
    public function editStatus($id)
    {
        $user = User::find($id);

        if ($user->status === 'active') {
            User::find($id)->update(["status" => "inactive"]);
        } else {
            User::find($id)->update(["status" => "active"]);
        }

        return redirect()->route('usuarios');    
    }
    //actualizar
    public function update(Request $request, $id)
    {
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Usuarios actualizado correctamente');

        $user = User::find($id)->update($request->all());
        return redirect()->route('usuarios')->with('message', session('success'));;
    }
}
