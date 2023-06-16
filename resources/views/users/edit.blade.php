@extends('layouts.app')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-body">
                    <div class="card border-warning border mb-3 mt-5">
                        <div class="card-header">
                            <h1 class="ms-4">Editar usuario</h1> 
                            <h1 class="ms-4">{{ $user->names }}</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{route('usuarios.actualizar', $user->id)}}" method="post">
                                @method('PUT')
                                @csrf
                                <table class="table table-centered table-nowrap table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th>Compañia</th>
                                            <td>
                                                <select name="company_id" class="form-select">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach($companies as $company)
                                                        <option value="{{ $company->id }}" @if($user->company_id == $company->id) selected @endif>{{ $company->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Nombre </th>
                                            <td><input type="text" class="form-control" name="names" value="{{ $user->names }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Apellidos</th>
                                            <td><input type="text" class="form-control" name="surnames" value="{{ $user->surnames }}" required></td>
                                        </tr>
                                        <tr>
                                            <th>Rol</th>
                                            <td>
                                                <select name="rol_id" class="form-select">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach($roles as $rol)
                                                        <option value="{{ $rol->id }}" @if($user->rol_id == $rol->id) selected @endif>{{ $rol->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Tipo de documento</th>
                                            <td>
                                                <select name="document_id" class="form-select">
                                                    <option value="">Seleccionar...</option>
                                                    @foreach($documents as $document)
                                                        <option value="{{ $document->id }}" @if($user->document_id == $document->id) selected @endif>{{ $document->acronym }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
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
                                            <th>Correo electrónico</th>
                                            <td><input type="email" class="form-control" name="email" value="{{ $user->email }}" required></td>
                                        </tr>  
                                        <tr>
                                            <th>Contraseña</th>
                                            <td><input type="password" class="form-control"name="password" value="{{ $user->password }}"></td>
                                        </tr> 
                                        <tr>
                                            <th>genero</th>
                                            <td>
                                                <select name="gender" class="form-control">
                                                    <option value="gender">Seleccionar...</option>
                                                    <option value="masculino">Masculino</option>
                                                    <option value="femenino">Femenino</option>
                                                </select>
                                            </td>
                                        </tr>                         
                                        <br>
                                        <br>
                                        <tr> 
                                            <th>
                                                <div class="button-list">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light">
                                                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Actualizar
                                                    </button>
                                                    <a  href= "{{ route('usuarios') }}" class="btn btn-danger waves-effect waves-light">
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