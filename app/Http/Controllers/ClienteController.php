<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('client.listClientes', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.clientindex');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $validacion = $request->validate([
                'nombre' => 'required|string|max:50',
                'apellido' => 'required|string|max:50',
                'cedula' => 'required|string|max:50',
                'email' => 'required|email',
                'telefono' => 'required|string|max:50',
                'dirección' => 'required|string|max:50',
            ]);
    
            $client = new Client();
    
            $client->nombre=$request->input('nombre');
            $client->apellido=$request->input('apellido');
            $client->cedula=$request->input('cedula');
            $client->email=$request->input('email');
            $client->telefono=$request->input('telefono');
            $client->dirección=$request->input('dirección');
            $client->save();
    
            return back();
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $client = Client::find($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
    
            $client->nombre=$request->input('nombre');
            $client->apellido=$request->input('apellido');
            $client->cedula=$request->input('cedula');
            $client->email=$request->input('email');
            $client->telefono=$request->input('telefono');
            $client->dirección=$request->input('dirección');

            $client->save();
            return back()->with('message','Actualización completada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::find($id);
        $client->delete();

        return back();
    }
  
}
