<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::apiResource('expenses', ExpenseController::class);
Route::apiResource('categories', CategoryController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
