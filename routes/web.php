<?php

use App\Livewire\Admin\RoleComponent;
use App\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\StateComponent;
use App\Livewire\Admin\TownshipComponent;
use App\Livewire\Admin\UniversityComponent;

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

    Route::get('states/{action?}/{id?}', StateComponent::class)->name('states');
    Route::get('townships/{action?}/{id?}', TownshipComponent::class)->name('townships');
    Route::get('universities/{action?}/{id?}', UniversityComponent::class)->name('universities');
    Route::get('academics/{action?}/{id?}', \App\Livewire\Admin\AcademicComponent::class)->name('academics');
});
