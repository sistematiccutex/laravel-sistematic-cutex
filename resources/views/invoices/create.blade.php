@extends('layouts.app')
@section('content')
    <h1 class="my-4">Crear Factura</h1>
    <form action="{{ route('facturas.guardar') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Clientes</label>
                    <div class="row">
                        <div class="col-8">
                            <select id="clientId" name="client_id" class="form-select" required>
                                <option value="">Seleccionar...</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->names }} {{ $client->surnames }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <button id="createClient" type="button" class="btn btn-info">Crear</button>
                        </div>
                    </div>

                </div>
                <div id="formClient" class="row" style="display: none">
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" class="form-control" name="names">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="name" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="surnames">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="company" class="form-label">Numero Documento</label>
                        <input type="number" class="form-control" name="document_number">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Direccion</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="position" class="form-label">Numero Celular</label>
                        <input type="number" class="form-control" name="cellphone">
                    </div>
                    <div class="mb-3 col-6">
                        <label for="position" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" >
                    </div>
                    <div class="mb-3 col-12">
                        <label for="name" class="form-label">Tipo Docuemnto</label>
                        <select name="document_id" id="" class="form-select">
                            <option value="">Seleccionar...</option>
                            @foreach ($documents as $document)
                                <option value="{{ $document->id }}">{{ $document->acronym }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><input class="mx-3" type="checkbox" name="product[]" value="{{ $product->id }}"></td>
                                <td> <img height="100" width="100" src="{{ asset($product->photo) }}" alt="">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    <select name="ammount[]">
                                        <option value="">Seleccione</option>
                                        @for ($i = 0; $i <= $product->stockDetail; $i++)
                                            <option value='{"productId": "{{ $product->id }}", "ammount": "{{ $i + 1 }}", "price": "{{ $product->price }}"}'>
                                                {{ $i + 1 }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12 d-flex justify-end">
                <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                <a href="{{ route('facturas') }}" class="btn btn-danger waves-effect waves-light" data-bs-dismiss="modal"
                aria-label="Close">Cancelar</a>
            </div>
        </div>
    </form>
@section('js')
    <script>
        const buttonEvent = document.getElementById('createClient')

        buttonEvent.addEventListener('click', function() {
            const formClient = document.getElementById('formClient')
            const selectClientId = document.getElementById('clientId')

            formClient.style.display = 'flex';
            selectClientId.required = false
        })

        const selectClientId = document.getElementById('clientId')

        selectClientId.addEventListener('change', function(event) {
            const formClient = document.getElementById('formClient')
            selectClientId.required = true

            formClient.style.display = 'none';
        })
    </script>
@endsection
@endsection
