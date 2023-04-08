<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Provider;
use App\Models\Color;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    ///listar Proveedor
    public function index()
    {

        //ORM Eloquent
        $products = Product::query()
            ->leftJoin('details', 'details.product_id', '=', 'products.id')
            ->select('products.id', 'products.photo', 'products.name', 'products.stock', 'products.reference', 'products.price', 'products.status', DB::raw('SUM(IF(details.stock,details.stock,0)) as stockDetail'))
            ->groupBy('products.id', 'products.photo', 'products.name', 'products.stock', 'products.reference', 'products.price', 'products.status', 'details.product_id')->get();
        $companies = Company::all();
        $providers = Provider::all();
        $colors = Color::all();
        $subcategories = Subcategory::all();
        $users = User::all();
        //select * from providers
        //me retorna la información en formato json
        return view('products.index', compact('products', 'companies', 'providers', 'colors', 'subcategories', 'users'));
    }
    //crear
    // public function create()
    // {
    //     return view('providers.create');
    // }
    //(guardar datos y retornar proveedores)
    public function store(Request $request)
    {

        $image = $request->file('file');

        $fileName = time() . "_" . $image->getClientOriginalName();

        $image->move(public_path('images'), $fileName);

        $request['photo'] = "images/" . $fileName;
        $request['user_id'] = Auth::user()->id;
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Producto creado correctamente');

        Product::create($request->all());
        return redirect()->route('productos')->with('message', session('success'));
    }
    //Eliminar--> retorno vista proveedores
    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('productos');
    }
    //mostrar detalles
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
    //editar
    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }
    //editar status
    public function editStatus($id)
    {
        $product = Product::find($id);

        if ($product->status === 'active') {
            Product::find($id)->update(["status" => "inactive"]);
        } else {
            Product::find($id)->update(["status" => "active"]);
        }

        return redirect()->route('productos');
    }
    //actualizar
    public function update(Request $request, $id)
    {
        // Guarda un mensaje de éxito en la sesión
        session()->flash('success', 'Productos actualizado correctamente');

        $product = Product::find($id)->update($request->all());
        return redirect()->route('productos')->with('message', session('success'));;
    }
}
