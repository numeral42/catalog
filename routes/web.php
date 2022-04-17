<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

/* use App\Models\Product;
 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $products = Product::where('status', 1)->latest('id')->paginate(8);
        return view('dashboard', compact('products'));
    })->name('dashboard');
}); */

Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('category/{category}', [ProductController::class, 'category'])->name('products.category');
Route::get('tag/{tag}', [ProductController::class, 'tag'])->name('products.tag');
