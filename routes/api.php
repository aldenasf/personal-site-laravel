<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/projects', [PostController::class, 'store'])->name('projects.store');
Route::delete('/projects', [PostController::class, 'delete'])->name('projects.delete');
Route::patch('/projects', [PostController::class, 'update'])->name('projects.update');
