<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Facturas Dashboard</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header>
        <nav>
            <a href="{{ route('clients.index') }}">Clientes</a> |
            <a href="{ route('products.index') }}">Productos</a> 
            <a href="{ route('invoices.index') }}">Facturas</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Facturas Dashboard</p>
    </footer>
</body>
</html>
