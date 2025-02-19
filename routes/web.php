<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;

//Home route
Route::get('/', function () {
    return view('auth.login');
});

//help route
Route::get('/help', function () {
    return view('help');
});

//Dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('index');

// ProductController routes
Route::get('/productstock', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('productstock');
Route::post('/products', [ProductController::class, 'store'])->middleware(['auth', 'verified'])->name('products.store');
Route::get('/products/{product}', [ProductController::class, 'show'])->middleware(['auth', 'verified'])->name('products.view');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware(['auth', 'verified'])->name('products.edit');
Route::patch('/products/{product}', [ProductController::class, 'update'])->middleware(['auth', 'verified'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware(['auth', 'verified'])->name('products.destroy');
Route::get('/products/{product}/desc_edit', [ProductController::class, 'editDescription'])->middleware(['auth', 'verified'])->name('products.desc_edit');
Route::post('/products/{product}/desc_update', [ProductController::class, 'updateDescription'])->middleware(['auth', 'verified'])->name('products.desc_update');
Route::patch('/products/{product}/toggle-trending', [ProductController::class, 'toggleTrending'])->name('products.toggleTrending');

// TicketController routes
Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
Route::get('/tickets/search', [TicketController::class, 'search'])->name('tickets.search');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show');

// Authentication routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/view', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// UserController routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/customers', [UserController::class, 'customers'])->name('customers.index');
    Route::get('/hosts', [UserController::class, 'hosts'])->name('hosts.index');
    Route::get('/users/createCustomer', [UserController::class, 'createCustomer'])->name('customers.create');
    Route::post('/customers', [UserController::class, 'store'])->name('customers.store');
    Route::get('/users/createHost', [UserController::class, 'createHost'])->name('hosts.create');
    Route::post('/hosts', [UserController::class, 'store'])->name('hosts.store');
    Route::get('/customers/{user}/edit', [UserController::class, 'edit'])->name('customers.edit');
    Route::put('/customers/{user}', [UserController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{user}', [UserController::class, 'destroy'])->name('customers.destroy');
    Route::get('/hosts/{user}/edit', [UserController::class, 'edit'])->name('hosts.edit');
    Route::put('/hosts/{user}', [UserController::class, 'update'])->name('hosts.update');
    Route::delete('/hosts/{user}', [UserController::class, 'destroy'])->name('hosts.destroy');
});

//ContactController routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

//SearchController routes
Route::get('/search', [SearchController::class, 'search'])->name('search');
