<?php

use Illuminate\Database\Seeder;

class PurchasedProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('purchased_products')->delete();
        
        \DB::table('purchased_products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'user_id' => 1,
                'quantity' => 3,
                'created_at' => '2021-07-04 22:47:14',
                'updated_at' => '2021-07-04 22:47:14',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 1,
                'user_id' => 1,
                'quantity' => 1,
                'created_at' => '2021-07-05 17:47:40',
                'updated_at' => '2021-07-05 17:47:40',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 5,
                'user_id' => 6,
                'quantity' => 3,
                'created_at' => '2021-07-05 17:47:40',
                'updated_at' => '2021-07-05 17:47:40',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 6,
                'user_id' => 4,
                'quantity' => 2,
                'created_at' => '2021-07-05 17:47:40',
                'updated_at' => '2021-07-05 17:47:40',
            ),
            4 => 
            array (
                'id' => 5,
                'product_id' => 7,
                'user_id' => 4,
                'quantity' => 2,
                'created_at' => '2021-07-05 19:44:23',
                'updated_at' => '2021-07-05 19:44:23',
            ),
            5 => 
            array (
                'id' => 6,
                'product_id' => 5,
                'user_id' => 6,
                'quantity' => 3,
                'created_at' => '2021-07-05 19:44:23',
                'updated_at' => '2021-07-05 19:44:23',
            ),
            6 => 
            array (
                'id' => 7,
                'product_id' => 1,
                'user_id' => 1,
                'quantity' => 2,
                'created_at' => '2021-07-05 19:44:23',
                'updated_at' => '2021-07-05 19:44:23',
            ),
        ));
        
        
    }
}