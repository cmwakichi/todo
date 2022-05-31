<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TodoController extends Controller
{
    public function index(){
        return view('index',['todos'=>todo::all()]);
    }
    public function store(Request $request){
        $attribute = $request->validate([
            'description'=>'required'
        ]);
        todo::create($attribute);
        return redirect('/');
    }
}
