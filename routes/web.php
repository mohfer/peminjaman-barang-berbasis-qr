<?php

use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Admin\Item\Item;
use App\Livewire\Admin\User\User;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Item\CreateItem;
use App\Livewire\Admin\Item\UpdateItem;
use App\Livewire\Admin\User\CreateUser;
use App\Livewire\Admin\User\UpdateUser;
use App\Http\Middleware\RedirectIfAuthenticated;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/auth/login', Login::class)->name('login')->middleware(RedirectIfAuthenticated::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::get('/users', User::class)->name('users');
    Route::get('/users/create', CreateUser::class)->name('create-users');
    Route::get('/users/{token}/edit', UpdateUser::class)->name('update-users');

    Route::get('/items', Item::class)->name('items');
    Route::get('/items/create', CreateItem::class)->name('create-items');
    Route::get('/items/{token}/edit', UpdateItem::class)->name('update-items');
});
