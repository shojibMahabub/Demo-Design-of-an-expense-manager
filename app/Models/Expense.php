<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $timestamps = true;
    public $fillable = ['expense_amount', 'note', 'transaction_account', 'expense_category_id'];
    
    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
    public function total_expense() {
        return Expense::sum('expense_amount');
    }
}
