@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-success border mb-3">
                    <div class="card-header"></div>
                    <h1 class="ms-3">Detalles del Producto</h1>
                    <div class="card-body">
                        <table class="table table-centered table-nowrap table-hover mb-0">
        
                            <!--Inicio de Tabla Detalles-->
                            <tr>
                                <th>Nombre Producto</th>
                                <td>{{ $product->name}}</td>
                            </tr>
                            <tr>
                                <th>Reference</th>
                                <td>{{ $product->reference }}</td>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <th>Cantidad</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Precio</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Measure</th>
                                <td>{{ $product->measure }}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td>{{ $product-> status  }}</td>
                            </tr>

                            
                            
                        </table>
                        <br>
                            <br>
                        <div class="button-list">
        
                            <a  href="{{ route('productos') }}"  type="submit" class="btn btn-danger waves-effect waves-light">
                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Cancelar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
