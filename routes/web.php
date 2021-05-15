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
Route::group(['prefix' => 'admin','middleware' => ['role:dashboard']], function () {

    Route::get('/', \App\Http\Livewire\Dashboard::class)->name('home');

    // Users Module Created By Firmanadi
    Route::get('users', \App\Http\Livewire\User::class)->name('users.index');

    Route::get('users-table', \App\Http\Livewire\UsersTable::class);

    Route::resource('users', \App\Http\Controllers\UserController::class)->except([
        'index'
    ]);

    // Permissions Module Created By Firmanadi
    Route::get('permissions', \App\Http\Livewire\Permission::class)->name('permissions.index');

    Route::get('permissions-table', \App\Http\Livewire\PermissionsTable::class);

    Route::resource('permissions', \App\Http\Controllers\PermissionController::class)->except([
        'index'
    ]);

    // Roles Module Created By Firmanadi
    Route::get('roles', \App\Http\Livewire\Role::class)->name('roles.index');

    Route::get('roles-table', \App\Http\Livewire\RolesTable::class);

    Route::resource('roles', \App\Http\Controllers\RoleController::class)->except([
        'index'
    ]);
});
