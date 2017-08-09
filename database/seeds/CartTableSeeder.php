<?php

use Illuminate\Database\Seeder;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart')->insert([
            'user_id' => 2,
            'total_price'=>680,
            'state'=>2,
            'order_date'=>date('Y-m-d',time()),
            'created_at'=>date('Y-m-d',time()),
        ]);

        DB::table('cart')->insert([
            'user_id' => 3,
            'total_price'=>780,
            'state'=>3,
            'order_date'=>date('Y-m-d',time()),
            'created_at'=>date('Y-m-d',time()),
        ]);
    }
}
