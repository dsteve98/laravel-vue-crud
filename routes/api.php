<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('add_todo', [TodoController::class, 'addTodoTask']);
Route::get('get_todo_list', [TodoController::class, 'showTodoTaskList']);
Route::post('edit_todo', [TodoController::class, 'editTodoTaskDescription']);
Route::get('check_todo/{id}/{checked}', [TodoController::class, 'toggleTodoTaskCheck']);
Route::get('delete_todo/{id}', [TodoController::class, 'deleteTodoTask']);

Route::get('download_pdf', [TodoController::class, 'downloadPdf']);
