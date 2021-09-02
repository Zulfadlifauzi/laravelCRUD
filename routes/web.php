<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Route::method('uri','action/callback')
Route::get('/schedules',[App\Http\Controllers\ScheduleController::class,'index'])->name('schedule:index')->middleware('auth');

Route::get('/schedules/create',[App\Http\Controllers\ScheduleController::class,'create'])->name('schedule:create');
Route::post('/schedules/create',[App\Http\Controllers\ScheduleController::class,'store'])->name('schedule:store');
Route::get('/schedules/{schedule}',[App\Http\Controllers\ScheduleController::class,'show'])->name('schedule:show');
Route::get('/schedules/{schedule}/edit',[App\Http\Controllers\ScheduleController::class,'edit'])->name('schedule:edit');