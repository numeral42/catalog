<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\OrderController;

Route::get('', [AdminController::class,'index'])->middleware('can:admin.index')->name('admin.index');

Route::resource('categories',CategoryController::class)->except('show')->names('admin.categories');
Route::resource('tags',TagController::class)->except('show')->names('admin.tags');

Route::resource('products',ProductController::class)->except('show')->names('admin.products');

Route::resource('users',UserController::class)->only('index', 'edit', 'update')->names('admin.users');

Route::resource('roles',RoleController::class)->except('show')->names('admin.roles'); 

Route::get('store', [AdminController::class,'store'])/* ->middleware('can:admin.index') */->name('admin.store');

Route::resource('providers',ProviderController::class)->names('admin.providers');
Route::resource('orders',OrderController::class)->names('admin.orders');