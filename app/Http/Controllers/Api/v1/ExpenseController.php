<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $list_of_expense = Expense::all();
            return Response($list_of_expense, 200);
        } catch (\Throwable $th) {
            return Response('something went wrong!', 204);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseRequest $request)
    {
        try {
     
            $expense = Expense::create(
                [
                    'expense_amount' => $request->expense_amount,
                    'note' => $request->note,
                    'transaction_account' => $request->transaction_account,
                    'expense_category_id' => $request->expense_category_id,
                ]
            );

            return Response($expense, 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        try {
            $expense = Expense::findOrFail($id);
            return Response($expense, 200);
        } catch (\Throwable $th) {
            return Response('something went wrong!', 204);
        }
    }

    public function getTotal(Request $id)
    {
        try {
            Log::debug('hi');
            $expense = new Expense();
            $total_expense = $expense->total_expense();
            return Response($total_expense, 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request,  $id)
    {
        try {
            $expense = Expense::findOrFail($id);
            $expense->update(
                [
                    'expense_amount' => $request->expense_amount,
                    'note' => $request->note,
                    'transaction_account' => $request->transaction_account,
                    'expense_category_id' => $request->expense_category_id,
                ]
            );

            return Response($expense, 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $expense = Expense::where('id',$id)->delete();
            return Response('Resource deleted!', 200);
        } catch (\Throwable $th) {
            Log::debug($th);
            return Response('something went wrong!', 204);
        }
    }
}
