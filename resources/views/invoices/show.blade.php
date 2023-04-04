@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card border-success border mb-3">
                    <div class="card-header"></div>
                    <h1 class="ms-3">Detalles del la Factura</h1>
                    <div class="card-body">
                        <table class="table table-centered table-nowrap table-hover mb-0">
        
                            <!--Inicio de Tabla Detalles-->
                            <tr>
                                <th>Hora</th>
                                <td>{{ $invoice->date_hour }}</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td>{{ $invoice->total }}</td>
                            </tr>
                            <tr>
                                <th>Usuario</th>
                                <td>{{ $invoice->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Cliente</th>
                                <td>{{ $invoice->client_id }}</td>
                            </tr>                            
                        </table>
                        <br>
                            <br>
                        <div class="button-list">
        
                            <a  href="{{ route('facturas') }}"  type="submit" class="btn btn-danger waves-effect waves-light">
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
