
@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Administración de Automoviles</h1>
@stop

@section('content')
    <p>Ingresar la información de los automóviles</p>

    <form action="{{route('carros.store')}}" method="post">
        @csrf
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="marca" label="Marca" placeholder="Marca del Automovil" label-class="text-lightblue" value="{{old('marca')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="modelo" label="Modelo" placeholder="Modelo del Automovil" label-class="text-lightblue" value="{{old('modelo')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="año" label="Año" placeholder="Año del Automovil" label-class="text-lightblue" value="{{old('año')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="color" label="Color" placeholder="Color del Automovil" label-class="text-lightblue" value="{{old('color')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="transmisión" label="Transmisión" placeholder="Transmisión del Automovil" label-class="text-lightblue" value="{{old('transmisión')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="potencia" label="Potencia" placeholder="Potencia del Automovil" label-class="text-lightblue" value="{{old('potencia')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="stock" label="Stock" placeholder="Stock del Automovil" label-class="text-lightblue" value="{{old('stock')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="placa_chasis" label="Placa" placeholder="Placa o Chasis del Automovil" label-class="text-lightblue" value="{{old('placa_chasis')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>

    <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script> console.log('Hi!');</script>
@stop

