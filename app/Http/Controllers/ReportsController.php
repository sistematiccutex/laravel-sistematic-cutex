<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Detail;
use App\Models\Product;

class ReportsController extends Controller
{
    //listar Reportes
    public function index(Request $request)
    {

        return view('reports.index');
    }

    public function getReports(Request $request)
    {
        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $totalVentas = DB::table('details')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->sum('price');

        $totalGrafica = Detail::query()
            ->select(DB::raw('date(created_at) as date'), DB::raw('SUM(price) as total_price'))
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->groupBy('date')
            ->get();

        $totalVendidos = Product::query()
            ->leftJoin('details', 'details.product_id', '=', 'products.id')
            ->select('products.id', 'products.photo', 'products.name', 'products.stock', 'products.reference', 'products.price', 'products.status', DB::raw('SUM(IF(details.stock,details.stock,0)) as stockDetail'))
            ->whereBetween('details.created_at', [$fechaInicio, $fechaFin])
            ->orderBy('stockDetail', 'desc')
            ->limit(5)
            ->groupBy('products.id', 'products.photo', 'products.name', 'products.stock', 'products.reference', 'products.price', 'products.status', 'details.product_id')->get();

        $totalProductos = DB::table('details')
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->sum('stock');


        return response()->json(['totalVentas' => $totalVentas, 'totalProductos' => $totalProductos, 'totalGrafica' => $totalGrafica, 'totalVendidos' => $totalVendidos]);
    }
}
