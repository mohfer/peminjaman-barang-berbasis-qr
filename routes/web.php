<?php

use App\Livewire\Status;
use App\Livewire\History;
use App\Livewire\Profile;
use App\Livewire\ItemList;
use App\Livewire\Dashboard;
use App\Livewire\User\Scan;
use App\Livewire\Auth\Login;
use App\Livewire\User\Borrow;
use App\Livewire\User\Returns;
use App\Livewire\Admin\Item\Item;
use App\Livewire\Admin\User\User;
use App\Livewire\Admin\User\Detail;
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
    Route::get('/status', Status::class)->name('status');
    Route::get('/histories', History::class)->name('histories');
    Route::get('/profile', Profile::class)->name('profile');

    Route::middleware('checkrole:admin')->group(function () {

        Route::get('/users', User::class)->name('users');
        Route::get('/users/create', CreateUser::class)->name('create-users');
        Route::get('/users/{token}/edit', UpdateUser::class)->name('update-users');
        Route::get('/users/{token}/detail', Detail::class)->name('detail');

        Route::get('/items', Item::class)->name('items');
        Route::get('/items/create', CreateItem::class)->name('create-items');
        Route::get('/items/{token}/edit', UpdateItem::class)->name('update-items');
    });

    Route::middleware('checkrole:user')->group(function () {

        Route::get('/lists', ItemList::class)->name('item-lists');

        Route::get('/scan', Scan::class)->name('scan');

        Route::get('/borrow/{token}', Borrow::class)->name('borrow');
        Route::get('/return/{token}', Returns::class)->name('return');
    });
});
