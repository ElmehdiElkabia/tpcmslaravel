<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.page');
});


Route::prefix('admin')->group(function () {
    Route::resource('sliders', SliderController::class);
    Route::resource('pages', PageController::class);
    Route::resource('about', AboutController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('furniture', FurnitureController::class);
    Route::resource('headers', HeaderController::class);
    Route::resource('info', InfoController::class);
});
//  Route::get('/{resource}/create', [AdminController::class, 'create'])->name('admin.resource.create');

//     // Edit routes
//     Route::get('/{resource}/{id}/edit', [AdminController::class, 'edit'])->name('admin.resource.edit');