<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>
<body>
    <h1>Editar Empleado</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $employee->name }}" required>
        <br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" value="{{ $employee->email }}" required>
        <br><br>

        <label for="position">Posición:</label>
        <input type="text" name="position" id="position" value="{{ $employee->position }}" required>
        <br><br>

        <label for="salary">Salario:</label>
        <input type="number" step="0.01" name="salary" id="salary" value="{{ $employee->salary }}" required>
        <br><br>

        <label for="address_id">ID Dirección:</label>
        <input type="number" name="address_id" id="address_id" value="{{ $employee->address_id }}" required>
        <br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <br>
    <a href="{{ route('employees.index') }}">Volver a la Lista</a>
</body>
</html>
