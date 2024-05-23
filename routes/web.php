<?php

use App\Livewire\Pages\Categories\Index as CategoryIndex;
use App\Livewire\Pages\Categories\Create as CategoryCreate;
use App\Livewire\Pages\Categories\Edit as CategoryEdit;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::group(['middleware' => ['auth']], function(){
    // dashboard route
    Route::view('dashboard', 'dashboard')->name('dashboard');
    // categories route
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function(){
        Route::get('/', CategoryIndex::class)->name('index');
        Route::get('/create', CategoryCreate::class)->name('create');
        Route::get('/edit/{category}', CategoryEdit::class)->name('edit');
    });
    // profile route
    Route::view('profile', 'profile')->name('profile');
});




require __DIR__.'/auth.php';
