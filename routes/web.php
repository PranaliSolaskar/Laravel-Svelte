<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\studentcontroller;
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
    return Inertia::render('Home');
});

Route::get('/stud',[studentcontroller::class,'index']);
/*Route::get('/students/create', function () {
    return Inertia::render('Students/Create');
})->name('students.create');*/
Route::get('/students/create', [studentcontroller::class,'create']);