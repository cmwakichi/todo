<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function index()
    {
        return view('index', ['todos' => todo::latest()->paginate(5)]);
    }

    public function store(Request $request, todo $todo)
    {

        $this->validate($request, [
            'description' => ['required', 'max:255', 'unique:todos,description'],
        ]);

        // saving todo
        $todo->description = $request->description;
        $todo->save();

        return redirect('/todo');
    }

    public function edit(todo $todo)
    {
        return view('edit', ['todo' => $todo]);
    }

    public function update(Request $request, todo $todo)
    {
        $validated = $request->validate([
            'description'=>['required', 'max:255', 'unique:todos,description']
        ]);
        $todo->description = $request->description;
        $todo->update(['description' => $request->description]);

        return redirect()->to('todo');
    }

    public function destroy(todo $todo)
    {
        $todo->delete();
        return back();
    }

}
