<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CarticonComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\DetailsComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImportController;

// Página inicial
Route::get('/', HomeComponent::class)->name('home');

// Rotas para admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});

// Rotas para customer
Route::middleware(['auth'])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

// Rotas para Shop
Route::get('/shop', ShopComponent::class)->name('shop');

// Rotas para Cart
Route::get('/cart', CartComponent::class)->name('cart');

// Rotas para Checkout
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

// Rotas para Product-Details
Route::get('/details/{slug}', DetailsComponent::class)->name('details');

// Rotas para carticon-component
Route::get('/carticon-component', CarticonComponent::class)->name('carticon-component');

// Rotas para csv-planilha
Route::get('/import-products', [ProductImportController::class, 'import']);

















// Rotas para usuário autenticado
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticação
require __DIR__.'/auth.php';
