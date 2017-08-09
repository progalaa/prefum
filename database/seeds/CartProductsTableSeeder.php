<?php

use Illuminate\Database\Seeder;

class CartProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cart_products')->insert([
            'cart_id' => 2,
            'product_id'=>1,
            'price'=>100,
            'qty'=>1,
            'created_at'=>date('Y-m-d',time()),
        ]);
        DB::table('cart_products')->insert([
            'cart_id' => 2,
            'product_id'=>2,
            'price'=>70,
            'qty'=>4,
            'created_at'=>date('Y-m-d',time()),
        ]);
        DB::table('cart_products')->insert([
            'cart_id' => 2,
            'product_id'=>13,
            'price'=>150,
            'qty'=>2,
            'created_at'=>date('Y-m-d',time()),
        ]);
        /*********************************/
        DB::table('cart_products')->insert([
            'cart_id' => 3,
            'product_id'=>1,
            'price'=>100,
            'qty'=>5,
            'created_at'=>date('Y-m-d',time()),
        ]);
        DB::table('cart_products')->insert([
            'cart_id' => 3,
            'product_id'=>2,
            'price'=>70,
            'qty'=>4,
            'created_at'=>date('Y-m-d',time()),
        ]);
    }
}
