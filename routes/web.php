<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\View;

View::share('appName', config('app.name'));

Route::get('/', function () {
    return view('welcome');
});

// Route für Benutzertabelle
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);
Route::get('/dashboard', [\App\Http\Controllers\UserController::class, 'index']);

Route::get('/helloworld', [TestController::class, 'printMessage']);

Route::get('/greeting/{firstName}/{lastName}', function ($firstName, $lastName) {
    return "<h1>Hallo $firstName $lastName!</h1>";
});

Route::resource('blog', BlogPostController::class);

Route::post('/submit', [FormController::class, 'submitForm']);
Route::get('/thanks', function () {
    return 'Danke für deine Anmeldung!';
});

// Test-Route für MailService
Route::get('/sendmail', function () {
    \App\Facades\MailService::send('test@example.com', 'Test-Betreff', 'Dies ist eine Testnachricht.');
    return 'MailService send() wurde aufgerufen.';
});

Route::get('/about', [AboutController::class, 'showAbout']);
Route::get('/profile', [ProfileController::class, 'showProfile']);

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submit']);

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('posts', PostController::class);

Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');
Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');
