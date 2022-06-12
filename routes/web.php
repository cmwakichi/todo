<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/todo');
});

Route::get('todo/create', [TodoController::class, 'create']);
Route::get('/todo', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
Route::delete('todos/{todo}', [TodoController::class, 'destroy']);
Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
Route::patch('/todos/{todo}', [TodoController::class, 'update']);

Route::get('consume-api', function () {

    // Here we are consuming an api from the following URL: https://bomet.untapped-global.com/api/citytapsissues
    // We are then displaying that data on the frontend on our application.
    // visit this route and see how it is displayed

    $response = Http::get('https://bomet.untapped-global.com/api/citytapsissues')
                    ->json();

    return view('citytaps.index', [
        'issues' => $response,
    ]);
});



