<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\Admin\AdminComponent;
use App\Livewire\Admin\Admin\RoleManagementComponent;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\Auth\LoginComponent;
use App\Livewire\Admin\CaseStudy\AddCaseStudyComponent;
use App\Livewire\Admin\CaseStudy\CaseStudyComponent;
use App\Livewire\Admin\Contents\ContentComponent;
use App\Livewire\Admin\Contents\ContentImportComponent;
use App\Livewire\Admin\Filesystem\UploadedFilesComponent;
use App\Livewire\Admin\Hadith\HadithComponent;
use App\Livewire\Admin\Hadith\HadithImportComponent;
use App\Livewire\Admin\Quran\QuranComponent;
use App\Livewire\Admin\Quran\QuranImportComponent;
use App\Livewire\Admin\Settings\ConsoleComponent;
use App\Livewire\Admin\Users\UsersComponent;
use App\Livewire\Admin\Word\WordComponent;
use App\Livewire\Admin\Word\WordImportComponent;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "Admin" middleware group. Now create something great!
|
*/

Route::get('admin/login', LoginComponent::class)->middleware('guest:admin')->name('admin.login');

Route::get('admin', function () {
    return redirect()->route('admin.dashboard');
})->middleware('auth:admin');
Route::prefix('admin/')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::post('logout', [LogoutController::class, 'adminLogout'])->name('logout');

    Route::get('dashboard', DashboardComponent::class)->name('dashboard');

    // Quran Routes
    Route::get('quran/imports', QuranImportComponent::class)->name('quranImports');
    Route::get('quran/data', QuranComponent::class)->name('quranData');

    // Hadith Routes
    Route::get('hadith/imports', HadithImportComponent::class)->name('hadithImports');
    Route::get('hadith/data', HadithComponent::class)->name('hadithData');

    // Word Routes
    Route::get('word/topics/imports', WordImportComponent::class)->name('wordImports');
    Route::get('word/topics/data', WordComponent::class)->name('wordTopicsData');

    // Content Routes
    Route::get('contents/imports', ContentImportComponent::class)->name('contentsImports');
    Route::get('contents/data', ContentComponent::class)->name('contentsData');


    // admin routes
    Route::get('all-admins', AdminComponent::class)->name('allAdmins')->middleware('permission:manage_admins');
    Route::get('all-admins/role-permissions', RoleManagementComponent::class)->name('adminRolePermissions')->middleware('permission:manage_roles_permissions');

    // user routes
    Route::get('all-users', UsersComponent::class)->name('allUsers')->middleware('permission:manage_users');

    // settings routes
    Route::get('settings/console', ConsoleComponent::class)->name('console')->middleware('permission:manage_console');
});
