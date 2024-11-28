<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Mostrar la lista de empleados
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    // Mostrar formulario para crear un nuevo empleado
    public function create()
    {
        return view('employees.create');
    }

    // Guardar un nuevo empleado
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
            'salary' => 'required|numeric',
            'address_id' => 'required|exists:addresses,id',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Empleado creado exitosamente.');
    }

    // Mostrar un empleado específico
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    // Mostrar formulario para editar un empleado
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    // Actualizar un empleado
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'position' => 'required',
            'salary' => 'required|numeric',
            'address_id' => 'required|exists:addresses,id',
        ]);

        $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    // Eliminar (lógico) un empleado
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
