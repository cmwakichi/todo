<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/todo');
});

Route::get('todo/create', [TodoController::class,'create']);
Route::get('/todo', [TodoController::class,'index']);
Route::post('/todo', [TodoController::class,'store']);
Route::delete('todos/{todo}',[TodoController::class,'destroy']);
Route::get('/todos/{todo}/edit',[TodoController::class,'edit']);
Route::patch('/todos/{todo}', [TodoController::class, 'update']);



