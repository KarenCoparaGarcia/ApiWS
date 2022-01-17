<?php

use App\Http\Controllers\ClientController;
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

Route::get('/', [ClientController::class, 'welcome']);
Route::post('/login', [ClientController::class, 'login'])->name('login');
Route::get('/index', [ClientController::class, 'index'])->name('index');
Route::get('/Customer', [ClientController::class, 'Customer'])->name('Customer');
Route::post('/CreateCustomer', [ClientController::class, 'create'])->name('createCustomer');