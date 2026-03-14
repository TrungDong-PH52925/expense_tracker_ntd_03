<?php
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('expenses', ExpenseController::class);
Route::apiResource('categories', CategoryController::class);  