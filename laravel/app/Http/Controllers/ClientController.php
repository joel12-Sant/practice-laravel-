<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use PHPUnit\TextUI\Configuration\Merger;

class ClientController extends Controller
{
    // Listar clientes
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    // Formulario para crear cliente
    public function create()
    {
        return view('clients.create');
    }

    // Guardar nuevo cliente
    public function store(Request $request)
    {
        $request->merge(['user_id' => 1]);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'rfc' => 'required|string|max:13',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
    }

    // Formulario para editar cliente
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    // Actualizar cliente
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'rfc' => 'required|string|max:13',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    // Eliminar cliente
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
