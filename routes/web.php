<?php

use App\Http\Controllers\AitoolsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/aitools/create', [AitoolsController::class, 'create'])->name('aitools.create');
    Route::get('/aitools/{aitool}/edit', [AitoolsController::class, 'edit'])->name('aitools.edit');
    Route::post('/aitools', [AitoolsController::class, 'store'])->name('aitools.store');
    Route::patch('/aitools/{aitool}', [AitoolsController::class, 'update'])->name('aitools.update');
    Route::delete('/aitools/{aitool}', [AitoolsController::class, 'destroy'])->name('aitools.destroy');

    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('categories.create');
    Route::get('/categories/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store');
    Route::patch('/categories/{category}', [CategorysController::class, 'update'])->name('categorys.update');
    Route::delete('/categories/{category}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
    Route::get('/tags/{tag}/edit', [TagsController::class, 'edit'])->name('tags.edit');
    Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
    Route::patch('/tags/{tag}', [TagsController::class, 'update'])->name('tags.update');
    Route::delete('/tags/{tag}', [TagsController::class, 'destroy'])->name('tags.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/aitools', [AitoolsController::class, 'index'])->name('aitools.index');
Route::get('/aitools/{id}', [AitoolsController::class, 'show'])->name('aitools.show');

Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('categories.show');

Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/{id}', [TagsController::class, 'show'])->name('tags.show');
