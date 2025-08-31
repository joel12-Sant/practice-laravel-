@extends('layouts.app')

@section('content')
<h1>{{ isset($client) ? 'Editar Cliente' : 'Crear Cliente' }}</h1>

<form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST">
    @csrf
    @if(isset($client))
        @method('PUT')
    @endif

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $client->name ?? '' }}" required><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ $client->email ?? '' }}" required><br>

    <label>RFC:</label>
    <input type="text" name="rfc" value="{{ $client->rfc ?? '' }}" required><br>

    <label>Teléfono:</label>
    <input type="text" name="phone" value="{{ $client->phone ?? '' }}"><br>

    <label>Dirección:</label>
    <input type="text" name="address" value="{{ $client->address ?? '' }}"><br>

    <button type="submit">{{ isset($client) ? 'Actualizar' : 'Crear' }}</button>
</form>
@endsection
