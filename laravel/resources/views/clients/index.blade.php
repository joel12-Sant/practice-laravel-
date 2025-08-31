@extends('layouts.app')

@section('content')
<h1>Clientes</h1>

<a href="{{ route('clients.create') }}">Crear Cliente</a>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>RFC</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Acciones</th>
    </tr>
    @foreach($clients as $client)
    <tr>
        <td>{{ $client->id }}</td>
        <td>{{ $client->name }}</td>
        <td>{{ $client->email }}</td>
        <td>{{ $client->rfc }}</td>
        <td>{{ $client->phone }}</td>
        <td>{{ $client->address }}</td>
        <td>
            <a href="{{ route('clients.edit', $client->id) }}">Editar</a>
            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
