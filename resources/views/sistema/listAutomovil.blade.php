@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Lista de Vehiculos</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        @role('Admin')
        <div class="card-head">
            <a href="{{route('carros.store')}}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
            <a href="{{route('generate.report')}}" class="btn btn-success float-right mt-2 mr-2">Generar Reporte</a>
        </div>
        @endrole
        <div class="card-body">
        {{-- Setup data for datatables --}}
    @php
        $heads = [
            'ID',
            ['label' => 'Marca', 'width'=> 10],
            ['label' => 'Modelo', 'width'=> 10],
            ['label' => 'Año', 'width'=> 10],
            ['label' => 'Color', 'width'=> 10],
            ['label' => 'Transmisión', 'width'=> 10],
            ['label' => 'Potencia', 'width' => 10],
            ['label' => 'Stock', 'width'=> 10],
            ['label' => 'Placa', 'width' => 10],
            ['label' => 'Actions', 'no-export' => true, 'width' => 10],
        ];

    $btnEdit = '';
    $btnDelete = '<button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                   <i class="fa fa-lg fa-fw fa-eye"></i>
               </button>';

    $config = [
       
        ];
    @endphp

        {{-- Minimal example / fill data using the component slot --}}
    <x-adminlte-datatable id="table1" :heads="$heads">
        @foreach($cars as $cars)
        <tr>
            <td>{{$cars->id}}</td>
            <td>{{$cars->marca}}</td>
            <td>{{$cars->modelo}}</td>
            <td>{{$cars->año}}</td>
            <td>{{$cars->color}}</td>
            <td>{{$cars->transmisión}}</td>
            <td>{{$cars->potencia}}</td>
            <td>{{$cars->stock}}</td>
            <td>{{$cars->placa_chasis}}</td>
            <td><a href="{{route('carros.edit', $cars)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                @role('Admin')
                <form style="display: inline" action="{{route('carros.destroy',$cars)}}" method="post" class="formEliminar">
                    @csrf
                    @method('delete')
                    {!!$btnDelete!!}
                </form>
                @endrole
                </td>
        </tr>
        @endforeach
    </x-adminlte-datatable>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script>
        $(document).ready(function(){
            $('.formEliminar').submit(function(e){
                e.preventDefault();
                Swal.fire({
  title: "Estas seguro?",
  text: "Se va ha eliminar un registro!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    })
                })
            })
    </script>
@stop

