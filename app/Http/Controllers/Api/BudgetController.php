<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function get(Request $req)
    {
        return Budget::where('user_id', $req->user()->id)
        ->where('month', now()->format('Y-m'))
        ->first();
    }

    public function store(Request $req)
    {
        return Budget::updateOrCreate(
            [
                'user_id' => $req->user()->id,
                'month' => now()->format('Y-m'),
            ],
            [
                'monthly_limit' => $req->monthly_limit
            ]
        );
    }
}
