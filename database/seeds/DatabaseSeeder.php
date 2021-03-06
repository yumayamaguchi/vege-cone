<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RestaurantsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(PurchasedProductsTableSeeder::class);
        $this->call(CartsTableSeeder::class);
    }
}
