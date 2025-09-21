<?php

use App\Livewire\Admin\RoleComponent;
use App\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\StateComponent;
use App\Livewire\Admin\MinistryComponent;
use App\Livewire\Admin\PE\StoreComponent;
use App\Livewire\Admin\TownshipComponent;
use App\Livewire\Admin\DashboardComponent;
use App\Livewire\Admin\UniversityComponent;
use App\Livewire\Admin\PE\PECreateComponent;
use App\Livewire\Admin\PE\PeIndexComponent;
use App\Livewire\Admin\PrerequisticComponent;

Route::get('/', function () {
    return view('admin.auth.login');
});

Route::get('/500', function () {
    abort(500);
});
Route::middleware(['auth:sanctum', 'checkRoleActive', config('jetstream.auth_session'), 'verified',])->prefix(config('fortify.prefix'))->as('admin.')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

    Route::get('users/{action?}/{id?}', UserComponent::class)->name('users');
    Route::get('roles/{action?}/{id?}', RoleComponent::class)->name('roles');

    Route::get('states/{action?}/{id?}', StateComponent::class)->name('states');
    Route::get('townships/{action?}/{id?}', TownshipComponent::class)->name('townships');
    Route::get('universities/{action?}/{id?}', UniversityComponent::class)->name('universities');
    Route::get('academics/{action?}/{id?}', \App\Livewire\Admin\AcademicComponent::class)->name('academics');

    Route::get('qualifications/{action?}/{id?}', \App\Livewire\Admin\QualificationComponent::class)->name('qualifications');
    Route::get('disciplines/{action?}/{id?}', \App\Livewire\Admin\EngineeringDisciplineComponent::class)->name('disciplines');
    Route::get('ministries/{action?}/{id?}', MinistryComponent::class)->name('ministries');
    Route::get('prerequistics/{action?}/{id?}', PrerequisticComponent::class)->name('prerequistics');

    //PE form
    Route::get('pe-registration', StoreComponent::class)->name('pe-registration');
    Route::get('pe/terms', \App\Livewire\Admin\PE\PETermsComponent::class)->name('admin.pe.terms');
    Route::get('pe/create-form', PECreateComponent::class)->name('pe-form-create');
    Route::get('pe/index', PeIndexComponent::class)->name('pe-form-index');
});