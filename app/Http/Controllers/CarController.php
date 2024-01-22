<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CarsExport;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('sistema.listAutomovil', compact('cars'));
       
    }

    public function showShop()
    {
        $cars = Car::all();
        $selectedCar = Car::find(1); // Obtener el vehículo con id = 1
    
        return view('shop', compact('cars', 'selectedCar'));
    }
    public function getCarDetails($id)
{
    $car = Car::findOrFail($id);
    return view('details', compact('car'));
}

    /**
     * Muestra el formulario para crear un nuevo automóvil.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
     
        return view('carsindex');
    }

    /**
     * Almacena un nuevo automóvil en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        // Validar la solicitud y almacenar el automóvil en la base de datos
        $validacion = $request->validate([
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'año' => 'required|numeric',
            'color' => 'required|string|max:50',
            'transmisión' => 'required|string|max:50',
            'potencia' => 'required|string|max:50',
            'stock' => 'required|numeric',
            'placa_chasis' => 'required|string|unique:cars,placa_chasis|max:50',
        ]);

        $car = new Car();

        $car->marca=$request->input('marca');
        $car->modelo=$request->input('modelo');
        $car->año=$request->input('año');
        $car->color=$request->input('color');
        $car->transmisión=$request->input('transmisión');
        $car->potencia=$request->input('potencia');
        $car->stock=$request->input('stock');
        $car->placa_chasis=$request->input('placa_chasis');

        $car->save();

        return back();
    }

    /**
     * Muestra los detalles de un automóvil específico.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\View\View
     */
    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    /**
     * Muestra el formulario para editar un automóvil.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\View\View
     */
    public function edit(string $id)
    {

        $cars = Car::find($id);
        return view('sistema.editAutomovil', compact('cars'));
    }

    /**
     * Actualiza el automóvil en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
 
        $car = Car::find($id);

        $car->marca=$request->input('marca');
        $car->modelo=$request->input('modelo');
        $car->año=$request->input('año');
        $car->color=$request->input('color');
        $car->transmisión=$request->input('transmisión');
        $car->potencia=$request->input('potencia');
        $car->stock=$request->input('stock');
        $car->placa_chasis=$request->input('placa_chasis');

        $car->save();

        return back()->with('message','Actualización completada');
    }
    /**
     * Elimina el automóvil de la base de datos.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $car = Car::find($id);
        $car->delete();

        return back();
    }
    public function generateReport(){
        return Excel::download(new CarsExport,'cars_report.xlsx');
    }
}

