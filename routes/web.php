<?php

use App\Http\Controllers\tasks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/delete/{id}', [tasks::class,'deleteTask']);
Route::post('/edit/{id}', [tasks::class,'edittask']);
Route::get('/', [tasks::class,'index']);
Route::post('/addtask', [tasks::class,'addtask']);