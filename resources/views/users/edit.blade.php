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
                                            <h4>Editar Usuarios</h4>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-------------------->
                        </div>
                        <div class="card-body">
                            <form action="{{route('usuarios.actualizar', $user->id)}}" method="post">
                                @method('PUT')
                                @csrf
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nombre </th>
                                            <td><input type="text" class="form-control" name="names" value="{{ $user->names }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Apellido</th>
                                            <td><input type="text" class="form-control" name="surnames" value="{{ $user->surnames }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Numero Documento</th>
                                            <td><input type="number" class="form-control" name="document_number" value="{{ $user->document_number }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Direccion</th>
                                            <td><input type="text" class="form-control" name="address" value="{{ $user->address }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Celular</th>
                                            <td><input type="number" class="form-control" name="cellphone" value="{{ $user->cellphone }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>email</th>
                                            <td><input type="email" class="form-control" name="email" value="{{ $user->email }}" required></td>
                                        </tr>   
                                        <tr>
                                            <th>genero</th>
                                            <td><input type="texto" class="form-control" name="gender" value="{{ $user->gender_id }}" required></td>
                                        </tr>                         
                                        <br>
                                        <br>
                                        <tr> 
                                            <th>
                                                <div class="button-list">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Actualizar
                                                    </button>
                                                    <a  href= "{{ route('proveedores') }}" class="btn btn-danger waves-effect waves-light">
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