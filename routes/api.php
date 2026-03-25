<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BudgetController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Api\ExpenseController;
use Illuminate\Support\Facades\Route;

    // Register & Login
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function ()
{
    //Category
    Route::get('/categories', [CategoryController::class, 'index']);
    // Expense
    Route::get('/expense', [ExpenseController::class, 'index']);
    Route::post('/expenses', [ExpenseController::class,'store']);
    Route::put('/expenses/{id}', [ExpenseController::class, 'update']);
    Route::delete('/expenses/{id}', [ExpenseController::class,'destroy']);

    //Budget
    Route::get('/budget', [BudgetController::class,'index']);
    Route::post('/budget', [BudgetController::class, 'store']);
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
});
