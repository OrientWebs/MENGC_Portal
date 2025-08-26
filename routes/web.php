<?php

use App\Livewire\Admin\RoleComponent;
use App\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/500', function () {
    abort(500);
});
Route::middleware(['auth:sanctum', 'checkRoleActive', config('jetstream.auth_session'), 'verified',])->prefix(env('ROUTE_PREFIX', 'admin'))->as('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('users/{action?}/{id?}', UserComponent::class)->name('users');
    Route::get('roles/{action?}/{id?}', RoleComponent::class)->name('roles');
});
