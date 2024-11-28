<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::with('movie')->get();
        return response()->json($characters);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'movie_id' => 'required|exists:movies,id',
            'picture' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $character = Character::create($validated);

        return response()->json($character, 201);
    }


    public function show($id)
    {
        $character = Character::with('movie')->find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        return response()->json($character, 200);
    }

    public function update(Request $request, $id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        $character->update($request->all());

        return response()->json($character, 200);
    }

    public function destroy($id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        $character->delete();

        return response()->json(['message' => 'Character deleted'], 200);
    }
}