<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\View;

View::share('appName', config('app.name'));

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloworld', [TestController::class, 'printMessage']);

Route::get('/greeting/{firstName}/{lastName}', function ($firstName, $lastName) {
    return "<h1>Hallo $firstName $lastName!</h1>";
});

Route::resource('blog', BlogPostController::class);

Route::post('/submit', [FormController::class, 'submitForm']);
Route::get('/thanks', function () {
    return 'Danke für deine Anmeldung!';
});

Route::get('/about', [AboutController::class, 'showAbout']);
Route::get('/profile', [ProfileController::class, 'showProfile']);

Route::get('/contact', [ContactController::class, 'showForm']);
Route::post('/contact', [ContactController::class, 'submit']);
