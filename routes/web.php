<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Livewire\Auth\Login;
use App\Livewire\Admin\DashboardAdmin;
use App\Livewire\Admin\User\User;
use App\Livewire\Admin\User\CreateUser;
use App\Livewire\Admin\User\UpdateUser;
use App\Livewire\Admin\Item\Item;
use App\Livewire\Admin\Item\CreateItem;
use App\Livewire\Admin\Item\UpdateItem;

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::get('/auth/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardAdmin::class)->name('dashboard-admin');

    Route::get('/users', User::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('create-users');
    Route::get('/users/{id}/edit', UpdateUser::class)->name('update-users');

    Route::get('/items', Item::class)->name('items');
    Route::get('/items/create', CreateItem::class)->name('create-items');
    Route::get('/items/{id}/edit', UpdateItem::class)->name('update-items');
});
