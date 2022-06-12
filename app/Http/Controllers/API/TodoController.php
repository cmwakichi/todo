<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return TodoResource::collection(todo::all());
    }

    public function store(Request $request, todo $Todo)
    {
        $validated = $request->validate([
            'description' => ['required', 'max:255', 'unique:todos,description'],
        ]);

        $Todo->description = $request->description;
        $Todo->update(['description' => $request->description]);

        return response()->json($Todo, 201);
    }

    public function show(todo $todo)
    {
        return response()->json($todo);
    }

    public function update(Request $request, todo $Todo)
    {
        $validated = $request->validate([
            'description' => ['required', 'max:255', 'unique:todos,description'],
        ]);

        $Todo->description = $request->description;
        $Todo->update(['description' => $request->description]);

        return response()->json($Todo, 201);
    }

    public function destroy(todo $todo)
    {
        $todo->delete();
        return response()->noContent();
    }
}
