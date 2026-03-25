<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use App\Models\Expense;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index(Request $req)
{
    $user = $req->user();

    if (!$user) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $currentMonth = now()->format('Y-m');

    $total = Expense::where('user_id', $user->id)
        ->whereMonth('spent_at', now()->month)
        ->sum('amount');

    $budget = Budget::where('user_id', $user->id)
        ->where('month', $currentMonth)
        ->first();

    $limit = $budget ? $budget->monthly_limit : 0;

    return response()->json([
        'total' => $total,
        'budget' => $limit,
        'remaining' => $limit - $total,
        'warning' => $total > $limit
    ]);
}
}
