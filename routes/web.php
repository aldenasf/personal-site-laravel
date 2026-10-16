<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/projects', [PostController::class, 'index']);

Route::get('/projects/{id}', function ($id) {
    return view('projects.post', ['id' => $id]);
});
