<?php

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\User\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\User\CreateUser;
use App\Livewire\Admin\User\UpdateUser;

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::get('/auth/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardAdmin::class)->name('dashboard-admin');

    Route::get('/users', User::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('create-users');
    Route::get('/users/{id}/update', UpdateUser::class)->name('update-users');
});
