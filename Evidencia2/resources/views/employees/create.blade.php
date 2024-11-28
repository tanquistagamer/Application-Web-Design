<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Empleado</title>
</head>
<body>
    <h1>Crear Nuevo Empleado</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="position">Posición:</label>
        <input type="text" name="position" id="position" required>
        <br>
        <label for="salary">Salario:</label>
        <input type="number" name="salary" id="salary" step="0.01" required>
        <br>
        <label for="address_id">ID Dirección:</label>
        <input type="number" name="address_id" id="address_id" required>
        <br><br>
        <button type="submit">Guardar</button>
    </form>
    <a href="{{ route('employees.index') }}">Volver a la Lista</a>
</body>
</html>