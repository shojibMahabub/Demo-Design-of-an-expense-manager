<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpenseSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $i) {
            DB::table('expenses')->insert([
                'id' => $i,
                'expense_category_id' => rand(1, 10),
                'expense_amount' => rand(50, 5000),
                'note' => "A demo note for expense id " . $i,
                'transaction_account' => array_rand(['bkash', 'cash', 'bank']),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
        }
    }
}
