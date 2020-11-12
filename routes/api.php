<?php

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
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('registration')->group(function () {
    Route::post('/',['uses'=>'App\Http\Controllers\Api\Auth\RegisterController@__invoke']);
});

Route::prefix('login')->group(function () {
    Route::post('/',['uses'=>'App\Http\Controllers\Api\Auth\LoginController@__invoke']);
});

Route::middleware('auth:api')->group(function ()
{
    Route::prefix('logout')->group(function () {
        Route::post('/',['uses'=>'App\Http\Controllers\Api\Auth\LogoutController@__invoke']);
    });

        Route::prefix('task')->group(function () {
            Route::get('/{task_id}',['uses'=>'App\Http\Controllers\TaskController@showTask']);
            Route::get('/',['uses'=>'App\Http\Controllers\TaskController@showTasks']);
            Route::post('/',['uses'=>'App\Http\Controllers\TaskController@createTask']);
            Route::put('/{task_id}',['uses'=>'App\Http\Controllers\TaskController@editTask']);
            Route::delete('/{task_id}',['uses'=>'App\Http\Controllers\TaskController@deleteTask']);

        });

            Route::prefix('todoList')->group(function () {
                Route::get('/{list_id}', ['uses' => 'App\Http\Controllers\TodoListController@showTodoList']);
                Route::get('/', ['uses' => 'App\Http\Controllers\TodoListController@showTodoLists']);
                Route::post('/', ['uses' => 'App\Http\Controllers\TodoListController@createTodoList']);
                Route::put('/{list_id}', ['uses' => 'App\Http\Controllers\TodoListController@editTodoList']);
                Route::delete('/{list_id}', ['uses' => 'App\Http\Controllers\TodoListController@deleteTodoList']);
            });
});
