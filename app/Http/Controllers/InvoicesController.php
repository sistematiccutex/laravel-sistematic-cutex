<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;
use App\Models\Client;
use App\Models\Document;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Detail;

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
    public function create()
    {
        $products = Product::query()
            ->leftJoin('details', 'details.product_id', '=', 'products.id')
            ->select('products.id', 'products.photo', 'products.name', 'products.reference', 'products.price', 'products.status', DB::raw('products.stock - SUM(IF(details.stock,details.stock,0)) as stockDetail'))
            // ->whereRaw('products.stock - SUM(IF(details.stock,details.stock,0))', '>', 0)
            ->groupBy('products.id', 'products.photo', 'products.name', 'products.reference', 'products.price', 'products.status', 'details.product_id', 'products.stock')
            ->get();

        $clients = Client::all();
        $documents = Document::all();

        return view('invoices.create', compact('products', 'clients', 'documents'));
    }
    //(guardar datos y retornar proveedores)
    public function store(Request $request)
    {
        $details = [];
        $ammount = $request->input('ammount');
        $total = 0;

        foreach ($ammount as $price) {
            if ($price !== null) {
                $detailData = json_decode($price);
                $total += $detailData->ammount * $detailData->price;
            }
        }

        $invoiceSave = Invoice::create([
            'date_hour' => now(),
            'total' => $total,
            'user_id' => Auth::user()->id,
            'client_id' => $request->input('client_id')
        ]);

        foreach ($ammount as $ammountd) {
            if ($ammountd !== null) {
                $detail = json_decode($ammountd);
                $dataInsert = [
                    "price" => $detail->price,
                    "stock" => $detail->ammount,
                    "subtotal" => $detail->ammount * $detail->price,
                    "product_id" => $detail->productId,
                    "invoice_id" => $invoiceSave->id
                ];

                Detail::create($dataInsert);
            }
        }

        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Factura creada correctamente');

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
