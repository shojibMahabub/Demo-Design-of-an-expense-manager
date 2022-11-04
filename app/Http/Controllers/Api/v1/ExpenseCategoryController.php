<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;
use App\Models\ExpenseCategory;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Log;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $list_of_expense = ExpenseCategory::with('expenses')->get();
            return Response($list_of_expense, 200);
        } catch (\Throwable $th) {
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseCategoryRequest $request)
    {
        try {
            $expense_category = ExpenseCategory::create(
                [
                    'name' => $request->name,
                    'image_path' => $request->image_path,
                    'expense_id' => $request->expense_id,
                ]
            );
            $expense_category->save();
            return Response($expense_category, 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $expense = ExpenseCategory::findOrFail($id);
            return Response($expense, 200);
        } catch (\Throwable $th) {
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseCategoryRequest  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $expense = ExpenseCategory::where('id',$id)->delete();
            return Response('Resource deleted!', 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }
}
