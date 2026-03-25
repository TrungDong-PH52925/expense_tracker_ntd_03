<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $req)
    {
        //Post data of Expense table to front_end
        return Expense::with('category')
                ->where('user_id', $req->user()->id())
                ->latest() # lấy bản ghi mới nhất (DESC)
                ->get(); # lấy tất cả

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $user = $req->user();

        $validated = $req->validate([
            'amount' => 'required|numeric|min:1',
            'category_id' => 'required|exists:categories,id',
            'spent_at' => 'required|date',
        ]);

        $expense = Expense::create([
            'user_id'=> $user->id,
            ...$validated
        ]);

        return response()->json($expense);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        $expense = Expense::where('user_id', $req->user()->id)->findOrFail($id);
        $expense->update($req->all());
        return $expense;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $req, string $id)
    {
        $expense = Expense::where('user_id', $req->user()->id)->findOrFail($id);
        $expense->delete();
        return ['message' => 'deleted'];
    }
}
