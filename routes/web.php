<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacijentsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard',[PacijentsController::class,'index'])->name('dashboard');

    Route::get('/pacijent',[PacijentsController::class,'add']);
    Route::post('/pacijent',[PacijentsController::class,'create']);
    
    Route::get('/pacijent/{pacijent}',[PacijentsController::class,'edit']);
    Route::post('/pacijent/{pacijent}',[PacijentsController::class,'update']);
});