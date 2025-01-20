<?php

use App\Livewire\App\ConductSearch\ConductSearchComponent;
use App\Livewire\App\HomeComponent;
use App\Livewire\App\PartialSearch\PartisalQSearchComponent;
use App\Livewire\App\PartialSearch\PartisalSearchComponent;
use App\Livewire\App\QueriesSearch\PartialSearchComponent;
use App\Livewire\App\QueriesSearch\QueryMenusComponent;
use App\Livewire\App\QueriesSearch\QuerySearchComponent;
use App\Livewire\App\QueriesSearch\QuerySearchResultComponent;
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
Route::get('/query-search/{id}', QuerySearchComponent::class)->name('app.QuerySearch');
Route::get('/quran-search-result', QuerySearchResultComponent::class)->name('app.QuerySearchResult');

// partial search
Route::get('/partial/query-search/{id}', PartisalQSearchComponent::class)->name('app.QuerySearchPartial');
Route::get('/partial/quran-search-result', PartisalSearchComponent::class)->name('app.QuerySearchResultPartial');

//Call Route Files
require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
