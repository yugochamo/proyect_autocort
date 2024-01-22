
@extends('adminlte::page')
@section('title','editar cliente')
@section('content_header')
    <h1>Administración de Automoviles</h1>
@stop

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4 text-center">Editar Cliente</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('cliente.index')}}">Clientes</a></li>
        <li class="breadcrumb-item active">Editar cliente</li>
    </ol>
    <div class="container w-100 border border-3 border-primary rounded p-4 mt-3">
        <form action="{{route('cliente.update',['client'=>$client->id])}}" method="post">
            @method('PUT')
            @csrf
            <div class="row g-3">
            {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="nombre" label="Nombre" placeholder="Nombres Completo" label-class="text-lightblue" value="{{$client->nombre}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="apellido" label="Apellido" placeholder="Apellidos Completo" label-class="text-lightblue" value="{{$client->apellido}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="cedula" label="Cedula" placeholder="Cedula del Cliente" label-class="text-lightblue" value="{{$client->cedula}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="email" name="email" label="Email" placeholder="Email del Cliente" label-class="text-lightblue" value="{{$client->email}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="telefono" label="Telefono" placeholder="09" label-class="text-lightblue" value="{{$client->telefono}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="dirección" label="Dirección" placeholder="Calle principal" label-class="text-lightblue" value="{{$client->dirección}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    <x-adminlte-button type="submit" label="Guardar" theme="primary" icon="fas fa-save"/>
            </div>
        </form>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    @if (session("message"))
    <script>
        $(document).ready(function(){
            let mensaje = "{{session ('message')}}";
            Swal.fire({
                'title': 'Resultado',
                'text': mensaje,
                'icon': 'success'
            })
        })
    </script>
    @endif
@stop

