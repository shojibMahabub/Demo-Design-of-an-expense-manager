<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public $timestamps = true;


    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
