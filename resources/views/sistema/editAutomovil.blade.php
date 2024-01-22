
@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Administración de Automoviles</h1>
@stop

@section('content')
    <p>Ingresar la información de los automóviles</p>

    <form action="{{route('carros.update',$cars)}}" method="post">
        @csrf
        @method('PUT')
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="marca" label="Marca" label-class="text-lightblue" value="{{$cars->marca}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="modelo" label="Modelo"  label-class="text-lightblue" value="{{$cars->modelo}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="año" label="Año"  label-class="text-lightblue" value="{{$cars->año}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="color" label="Color"  label-class="text-lightblue" value="{{$cars->color}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="text" name="transmisión" label="Transmisión"  label-class="text-lightblue" value="{{$cars->transmisión}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="potencia" label="Potencia"  label-class="text-lightblue" value="{{$cars->potencia}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="number" name="stock" label="Stock"  label-class="text-lightblue" value="{{$cars->stock}}">
        <x-slot name="prependSlot">
            <div class="input-group-text">
                <i class="fas fa-user text-lightblue"></i>
            </div>
        </x-slot>
    </x-adminlte-input>
    {{-- With prepend slot--}}
    <x-adminlte-input type="string" name="placa_chasis" label="Placa" label-class="text-lightblue" value="{{$cars->placa_chasis}}">
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

