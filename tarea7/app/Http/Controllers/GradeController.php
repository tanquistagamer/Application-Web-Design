<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(Subject $subject)
    {
        $grades = $subject->grades;
        return view('grades.index', compact('subject', 'grades'));
    }

    public function create(Subject $subject)
    {
        return view('grades.create', compact('subject'));
    }

    public function store(Request $request, Subject $subject)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'grade' => 'nullable|numeric|between:0,100',
            'date' => 'required|date',
        ]);

        $subject->grades()->create($request->only('type', 'grade', 'date'));

        return redirect()->route('grades.index', $subject)->with('success', 'Calificación agregada correctamente.');
    }

    public function edit(Subject $subject, Grade $grade)
    {
        return view('grades.edit', compact('subject', 'grade'));
    }

    public function update(Request $request, Subject $subject, Grade $grade)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'grade' => 'nullable|numeric|between:0,100',
            'date' => 'required|date',
        ]);

        $grade->update($request->only('type', 'grade', 'date'));

        return redirect()->route('grades.index', $subject)->with('success', 'Calificación actualizada correctamente.');
    }

    public function destroy(Subject $subject, Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index', $subject)->with('success', 'Calificación eliminada correctamente.');
    }
}
