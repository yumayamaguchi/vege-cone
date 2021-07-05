<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carts')->delete();
        
        \DB::table('carts')->insert(array (
            0 => 
            array (
                'id' => 8,
                'restaurant_id' => 1,
                'product_id' => 2,
                'quantity' => 2,
                'created_at' => '2021-07-05 19:44:55',
                'updated_at' => '2021-07-05 19:44:55',
            ),
            1 => 
            array (
                'id' => 9,
                'restaurant_id' => 1,
                'product_id' => 4,
                'quantity' => 3,
                'created_at' => '2021-07-05 19:45:02',
                'updated_at' => '2021-07-05 19:45:02',
            ),
            2 => 
            array (
                'id' => 10,
                'restaurant_id' => 1,
                'product_id' => 6,
                'quantity' => 2,
                'created_at' => '2021-07-05 19:45:10',
                'updated_at' => '2021-07-05 19:45:10',
            ),
        ));
        
        
    }
}