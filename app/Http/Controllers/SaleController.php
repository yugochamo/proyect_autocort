<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Car;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sales = Sale::all();
        return view('sistema.listVentas', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $users = User::all();
        $cars = Car::all();
        $clients = Client::all();
        return view('sistema.editVenta', compact('users','cars','clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validacion = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'user_id' => 'required|exists:users,id',
            'client_id' => 'required|exists:clients,id',
            'cantidad' => 'required|string|min:1',
            'estado' => 'required|string|max:50',
            'fecha_venta' => 'required|date',
            'precio_venta' => 'required|numeric',
        ]);

        $sale = new Sale();

        $sale->car_id=$request->input('car_id');
        $sale->user_id=$request->input('user_id');
        $sale->client_id=$request->input('client_id');
        $sale->cantidad=$request->input('cantidad');
        $sale->estado=$request->input('estado');
        $sale->fecha_venta=$request->input('fecha_venta');
        $sale->precio_venta=$request->input('precio_venta');

        $sale->save();

        if ($request->estado === 'Despachado'){
            $car = Car::find($request->car_id);

            if ($car->stock >= $request->cantidad){
                $car->stock -= $request->cantidad;
                $car->save();
            } else {
                throw new \Exception('No hay suficiente stock para realizar la venta.');
            }
        }
        return back()->with('message', 'Venta agregada correctamente.');
    }

 
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
          
    }
    /**
     * Muestra los detalles de un automóvil específico.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\View\View

     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sales = Sale::find($id);
        return view('sistema.editVenta', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $sales = Sale::find($id);

        if (!$sales){
            abort(404);
        }

        $validacion = $request->validate([
            'car_id' => 'required|string|unique:sales,cad_id,'.$id,
            'user_id' => 'required|string|unique:sales,user_id'.$id,
            'client_id' => 'required|numeric|unique:sales,client_id,'.$id,
            'cantidad' => 'required|string|max:50',
            'estado' => 'required|string|max:50',
            'fecha_venta' => 'required|date|max:50',
            'precio_venta' => 'required|numeric',
        ]);

        $sales->update($validacion);

        return back()->with('message', 'Venta actualizado correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
