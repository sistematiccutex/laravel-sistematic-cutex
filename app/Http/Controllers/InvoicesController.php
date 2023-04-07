<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Client;

class InvoicesController extends Controller
{
    ///listar Proveedor
    public function index()
    {

        //ORM Eloquent
        $invoices = Invoice::all();
        $users = User::all();
        $clients = Client::all();
        //select * from providers
        //me retorna la información en formato json
        return view('invoices.index', compact('invoices', 'users', 'clients'));
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
        session()->flash('success', 'Factura creado correctamente');

        Invoice::create($request->all());
        return redirect()->route('facturas')->with('message', session('success'));
    }
    //Eliminar--> retorno vista proveedores
    public function destroy($id)
    {
        Invoice::find($id)->delete();
        return redirect()->route('facturas');
    }
    //mostrar detalles
    public function show($id)
    {
        $invoice = Invoice::find($id);
        return view('invoices.show', compact('invoice'));
    }
    //editar
    public function edit($id)
    {
        $invoice = Invoice::find($id);

        return view('invoices.edit', compact('invoice'));
    }
    //editar status
    public function editStatus($id)
    {
        $invoice = Invoice::find($id);

        if ($invoice->status === 'active') {
            Invoice::find($id)->update(["status" => "inactive"]);
        } else {
            Invoice::find($id)->update(["status" => "active"]);
        }

        return redirect()->route('facturas');
    }
    //actualizar
    public function update(Request $request, $id)
    {
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Factura actualizado correctamente');

        $invoices = Invoice::find($id)->update($request->all());
        return redirect()->route('facturas')->with('message', session('success'));;
    }
}
