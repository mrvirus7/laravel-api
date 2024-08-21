<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

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
Route::get('project', function(){
    return 'project';
});

Route::post('/project', function(){

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('project',ProjectController::class);

Route::get('students',[StudentController::class,'index']);
Route::post('students',[StudentController::class,'saveData']);
Route::delete('students/{id}',[StudentController::class,'deleteData']);
Route::get('students/{id}',[StudentController::class,'showbyId']);
Route::put('students/{id}',[StudentController::class,'updateStudent']);


// Route::get('index', function(){
//     return 'this is testing  method';
// });
