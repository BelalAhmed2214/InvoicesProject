<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProjectController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
########## Begin Customer Route ########################
Route::get('customers',[CustomerController::class,'index']);
Route::post('customers ',[CustomerController::class,'create']);
Route::get('customers/{id}',[CustomerController::class,'show']);
Route::patch('customers/{id}',[CustomerController::class,'update']);
Route::delete('customers/{id}',[CustomerController::class,'delete']);
############# End Customer Route ##########################
########## Begin Note Route ########################
Route::get('customers/{customerId}/notes/{id}',[NoteController::class,'show']);
Route::patch('customers/{customerId}/notes/{id}',[NoteController::class,'update']);
Route::delete('customers/{customerId}/notes/{id}',[NoteController::class,'delete']);
Route::get('customers/{customerId}/notes',[NoteController::class,'index']);
Route::post('customers/{customerId}/notes',[NoteController::class,'create']);
########## End Note Route ########################
########## Begin Project Route ########################
Route::get('customers/{customerId}/projects/{id}',[ProjectController::class,'show']);
Route::patch('customers/{customerId}/projects/{id}',[ProjectController::class,'update']);
Route::delete('customers/{customerId}/projects/{id}',[ProjectController::class,'delete']);
Route::get('customers/{customerId}/projects',[ProjectController::class,'index']);
Route::post('customers/{customerId}/projects',[ProjectController::class,'create']);
########## End Project Route ########################
