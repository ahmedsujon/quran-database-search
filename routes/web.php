<?php

use App\Livewire\App\ConductSearch\ConductSearchComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\QueriesSearch\QueryMenusComponent;
use App\Livewire\App\QueriesSearch\QuerySearchComponent;
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

Route::get('/', HomeComponent::class)->name('app.home');
Route::get('/conduct-search', ConductSearchComponent::class)->name('app.ConductSearch');

Route::get('/query-search-menus', QueryMenusComponent::class)->name('app.QuerySearchMenu');
Route::get('/query-search', QuerySearchComponent::class)->name('app.QuerySearch');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
