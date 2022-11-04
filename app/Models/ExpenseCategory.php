<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['name', 'image_path'];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
