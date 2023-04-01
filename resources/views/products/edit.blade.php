@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="card border-warning border mb-3 mt-5">
                        <div class="row ">
                              <!--Título Editar proveedor-->
                            <div class="col-2">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <h4>Editar Producto</h4>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-------------------->
                        </div>
                        <div class="card-body">
                            <form action="{{route('productos.actualizar', $product->id)}}" method="post">
                                @method('PUT')
                                @csrf
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nombre Producto</th>
                                            <td><input type="text" class="form-control" name="name" value="{{ $product->name }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Referencia</th>
                                            <td><input type="text" class="form-control" name="reference" value="{{ $product->reference }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Descripcion</th>
                                            <td><input type="text" class="form-control" name="description" value="{{ $product->description }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Cantidad</th>
                                            <td><input type="number" class="form-control" name="stock" value="{{ $product->stock }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Precio</th>
                                            <td><input type="number" class="form-control" name="price" value="{{ $product->price }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Medida</th>
                                            <td><input type="number" class="form-control" name="measure" value="{{ $product->measure }}" required></td>
                                        </tr>
                                
                                
                                        <br>
                                        <br>
                                        <tr> 
                                            <th>
                                                <div class="button-list">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Actualizar
                                                    </button>
                                                    <a  href= "{{ route('productos') }}" class="btn btn-danger waves-effect waves-light">
                                                        <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Cancelar
                                                    </a>
                                                </div>

                                            </th>
                                        </tr>
                                        
                                     </thead>
                                    </table>
                            </form>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
