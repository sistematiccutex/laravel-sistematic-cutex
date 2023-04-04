@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-success border mb-3">
                    <div class="card-header"></div>
                    <h1 class="ms-3">Detalles del proveedor</h1>
                    <div class="card-body">
                        <table class="table table-centered table-nowrap table-hover mb-0">
        
                            <!--Inicio de Tabla Detalles-->
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $user->names }}</td>
                            </tr>
                            <tr>
                                <th>Apellido</th>
                                <td>{{ $user->surnames }}</td>
                            </tr>
                            <tr>
                                <th>Numero Documento</th>
                                <td>{{ $user->document_number }}</td>
                            </tr>
                            <tr>
                                <th>Direccion</th>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <th>Cellphone</th>
                                <td>{{ $user->cellphone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email}}</td>
                            </tr>
                            <tr>
                                <th>Estado:</th>
                                <td>{{ $user-> status  }}</td>
                            </tr>
                        </table>
                        <br>
                            <br>
                        <div class="button-list">
        
                            <a  href="{{ route('usuarios') }}"  type="submit" class="btn btn-danger waves-effect waves-light">
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
