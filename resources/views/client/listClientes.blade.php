@extends('adminlte::page')
@section('title','Dashboard')
@section('content_header')
    <h1>Lista de Clientes</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="card">
        @role('Admin')
        <div class="card-head">
            <a href="{{route('cliente.store')}}" class="btn btn-primary float-right mt-2 mr-2">Nuevo</a>
        </div>
        @endrole
        <div class="card-body">
        {{-- Setup data for datatables --}}
    @php
        $heads = [
            ['label' => 'ID', 'width'=> 10],
            ['label' => 'Nombre', 'width'=> 10],
            ['label' => 'Apellido', 'width'=> 10],
            ['label' => 'Cedula', 'width'=> 10],
            ['label' => 'Email', 'width'=> 10],
            ['label' => 'Telefono', 'width'=> 10],
            ['label' => 'Dirección', 'width'=> 10],
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
        @foreach($clients as $clients)
        <tr>
            <td>{{$clients->id}}</td>
            <td>{{$clients->nombre}}</td>
            <td>{{$clients->apellido}}</td>
            <td>{{$clients->cedula}}</td>
            <td>{{$clients->email}}</td>
            <td>{{$clients->telefono}}</td>
            <td>{{$clients->dirección}}</td>
            <td><a href="{{route('cliente.edit', $clients)}}" class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                <i class="fa fa-lg fa-fw fa-pen"></i>
                </a>
                @role('Admin')
                <form style="display: inline" action="{{route('cliente.destroy',$clients)}}" method="post" class="formEliminar">
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

