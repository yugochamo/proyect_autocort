
@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
@push('css')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <h1>Administración de Ventas</h1>
@stop

@section('content')
    <p>Ingresar la información de la Venta</p>

    <form action="{{ route('venta.store') }}" method="post">
        @csrf

        {{-- Cantidad --}}
        <div class="col-md-4 mb-2">
            <label for="cantidad" class="from-label">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" class="from-control">
        </div>
        {{-- Estado --}}
        <x-adminlte-select name="estado" id="estado" label="Estado de la Venta" label-class="text-lightblue" igroup-size="lg" value="{{ old('estado') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-car-side"></i>
                </div>
            </x-slot>
            <option value="">Seleccione el estado de la venta</option>
            <option value="Despachado">Despachado</option>
            <option value="No Despachado">No Despachado</option>
        </x-adminlte-select>

        {{-- Fecha --}}
        <x-adminlte-input type="date" name="fecha_venta" id="fecha" label="Fecha" label-class="text-lightblue" value="{{ old('fecha_venta') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- Precio --}}
        <x-adminlte-input type="number" name="precio_venta" id="precio" label="Precio" label-class="text-lightblue" value="{{ old('precio_venta') }}">
            <x-slot name="prependSlot">
                <div class="input-group-text">
                    <i class="fas fa-user text-lightblue"></i>
                </div>
            </x-slot>
        </x-adminlte-input>

        {{-- Carro --}}
        <x-adminlte-select name="car_id" id="vehiculo_id" label="Seleccione un carro" label-class="text-lightblue" igroup-size="lg">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-car"></i>
                </div>
            </x-slot>
            <option value="">Seleccione un carro</option>
            @foreach($cars as $car)
                <option value="{{ $car->id }}">{{ $car->marca }} - {{ $car->modelo }}</option>
            @endforeach
        </x-adminlte-select>

        {{-- Cliente --}}
        <x-adminlte-select name="client_id" id="cliente_id" label="Seleccione un cliente" label-class="text-lightblue" igroup-size="lg">
            <x-slot name="prependSlot">
                <div class="input-group-text bg-gradient-info">
                    <i class="fas fa-user"></i>
                </div>
            </x-slot>
            <option value="">Seleccione un cliente</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}">{{ $client->nombre }}</option>
            @endforeach
        </x-adminlte-select>
        {{-- Usuario --}}
            <x-adminlte-select name="user_id" label="Seleccione un usuario" label-class="text-lightblue" igroup-size="lg">
                <x-slot name="prependSlot">
                    <div class="input-group-text bg-gradient-info">
                        <i class="fas fa-user"></i>
                    </div>
                </x-slot>
                <option value="">Seleccione un usuario</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </x-adminlte-select>
            {{--Cantidad de Vehiculos vendidos (campo oculto)--}}
            <input type="hidden" name="cantidad_vendida" id="cantidad_vendida" value="{{old('cantidad')}}">

            {{-- ID del automovil seleccionado (campo oculto)--}}
            <input type="hidden" name="car_id_selected" id="car_id_selected" value="{{old('car_id')}}">
        <!--Boton para agregar-->
        <div class="col-md-12 mb-4 mt-2 text-end">
            <button id="btn_agregar" class="btn btn-primary" type="button">Agregar</button>
        </div>
        
        <!--tabla para el detalle de la compra-->
        <div class="col-mb-12">
            <div class="table-responsive">
                <table id="table_detalle" class="table table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>#</th>
                            <th>Vehiculo</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Suma</th>
                            <th>0</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>0</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @if (session("message"))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session('message') }}";
                Swal.fire({
                    'title': 'Resultado',
                    'text': mensaje,
                    'icon': 'success'
                });
            });
            $('$estado').change(function(){
                var estado = $(this).val();
                console.log('Estado cambiado a:', estado);

                if (estado === 'Despachado'){
                    var cantidad = prompt('Ingresar la cantidad de vehículos vendidos:');
                    if(!isNaN(cantidad) && cantidad > 0){
                        console.log('Cantidad de vehiculos vendidos:',cantidad);

                        var car_id = $('#car_id').val();
                        console.log('ID del automovil seleccionado:', car_id);
                        $('#cantidad_vendida').val(cantidad);
                        $('#car_id_selected').val(car_id);
                    } else {
                        $(this).val('');
                        alert('La cantidad ingresada no es valida.');
                    }
                }
            });
        </script>
        <script >
            $(document).ready(function(){
                $('#btn_agregar').click(function(){
                    agregarProducto();
                });
            });


            let cont = 0;
            let subtotal = [];

            function agregarProducto(){
                let idVehiculo = $('#vehiculo_id').val();
                let cantidad = $('#cantidad').val();
                let precio_venta =$('#precio_venta').val();

                subtotal[cont] = cantidad * precio_venta;

                let fila = '<tr>' +
                    '<th>' + (cont + 1) + '</th>' +
                    '<td>' + vehiculo_id +'</td>' +
                    '<td>' + cantidad + '</td>' + 
                    '<td>' + precio_venta +'</td>' +
                    '<td>'+ subtotal[cont] +'</td>' +
                    '<td><button class="btn btn-danger" type="button"><i class="fa-solid fa-trash"></i></button></td>' +
                    '</tr>';

                $('#table_detalle').append(fila);
            }
        </script>
    @endif
@stop
