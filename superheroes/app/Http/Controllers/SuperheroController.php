<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;

class SuperheroController extends Controller
{
    public function index()
    {
        $superheroes = Superhero::all();
        return view('superheroes.index', compact('superheroes'));
    }

    public function create()
    {
        return view('superheroes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'real_name' => 'required|max:255',
            'hero_name' => 'required|max:255',
            'photo_url' => 'required|url',
            'additional_info' => 'nullable',
        ]);

        Superhero::create($request->all());
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe creado correctamente.');
    }

    public function show($id)
    {
        $superhero = Superhero::findOrFail($id);
        return view('superheroes.show', compact('superhero'));
    }

    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id);
        return view('superheroes.edit', compact('superhero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'real_name' => 'required|max:255',
            'hero_name' => 'required|max:255',
            'photo_url' => 'required|url',
            'additional_info' => 'nullable',
        ]);

        $superhero = Superhero::findOrFail($id);
        $superhero->update($request->all());
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe actualizado correctamente.');
    }

    public function destroy($id)
    {
        $superhero = Superhero::findOrFail($id);
        $superhero->delete();
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe eliminado correctamente.');
    }
}
