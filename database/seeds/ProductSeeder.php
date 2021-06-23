<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'producer_id' => '1',
                'name' => 'ほうれん草',
                'image' => '../image/image-1.jpg',
                'introduction' => '有機野菜です、多少虫食いあり',
            ],
            [
                'producer_id' => '2',
                'name' => '茄子',
                'image' => '../image/image-2.jpg',
                'introduction' => '長茄子です。形が変形してますが、味に問題なし',
            ],
        ]);
    }
}
