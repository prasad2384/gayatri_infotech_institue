<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\studentcontroller;
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
Route::post('activebatch',[admincontroller::class,'activebatchs']);
Route::post('Deletecourseadds',[admincontroller::class,'delete_courses_adds']);
Route::post('showstudentdetails',[admincontroller::class,'showstudent']);
Route::post('fetchbatchtime/{id}',[admincontroller::class,'fetch_batchtimes']);
