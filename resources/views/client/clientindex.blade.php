
@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Administración de Clientes</h1>
@stop

@section('content')
    <p>Ingresar la información de los Clientes</p>

    <form action="{{route('cliente.store')}}" method="post">
        @csrf
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="Nombres Completo" label-class="text-lightblue" value="{{old('nombre')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="apellido" label="Apellido" placeholder="Apellidos Completo" label-class="text-lightblue" value="{{old('apellido')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="cedula" label="Cedula" placeholder="Cedula del Cliente" label-class="text-lightblue" value="{{old('cedula')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="email" name="email" label="Email" placeholder="Email del Cliente" label-class="text-lightblue" value="{{old('email')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="telefono" label="Telefono" placeholder="09" label-class="text-lightblue" value="{{old('telefono')}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="dirección" label="Dirección" placeholder="Calle principal" label-class="text-lightblue" value="{{old('dirección')}}">
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

