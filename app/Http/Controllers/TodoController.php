<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    public function create(){
        return view('create');
    }
    public function index(){
        return view('index',['todos'=>todo::latest()->paginate(5)]);
    }
    public function store(Request $request,todo $todo){

        $this->validate($request,[
'description' => ['required','max:255','unique:todos,description']
        ]);

        // saving todo
        $todo->description = $request->description;
        $todo->save();

        return redirect('/');
    }
    public function destroy(todo $todo){
        $todo->delete();
        return back()->with('success', 'item deleted');
    }

}
