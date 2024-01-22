
@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Lista de Ventas</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        <div class="card-head">
            <a href="{{route('venta.create')}}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
        </div>
        <div class="card-body">
        {{-- Setup data for datatables --}}
    @php
        $heads = [
            ['label' => 'ID', 'width'=>10],
            ['label' => 'car_id', 'width'=> 10],
            ['label' => 'client_id', 'width'=> 10],
            ['label' => 'cantidad', 'width'=> 10],
            ['label' => 'estado', 'width'=> 10],
            ['label' => 'fecha', 'width' => 10],
            ['label' => 'precio', 'width'=> 10],
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
        @foreach($sales as $sales)
        <tr>
            <td>{{$sales->car_id}}</td>
            <td>{{$sales->user_id}}</td>
            <td>{{$sales->client_id}}</td>
            <td>{{$sales->cantidad}}</td>
            <td>{{$sales->estado}}</td>
            <td>{{$sales->fecha_venta}}</td>
            <td>{{$sales->precio_venta}}</td>
            <td><a href="{{route('venta.edit', $sales)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
            </button>
                <form style="display: inline" action="{{route('venta.destroy',$sales)}}" method="post" class="formEliminar">
                    @csrf
                    @method('delete')
                    {!!$btnDelete!!}
                </form>
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
  text: "Se va ha eliminar una Venta!",
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

