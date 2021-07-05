<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'name' => 'じゃがいも',
                'image' => 'LEEiMos8m15rEqLuQl6mIEEShJO5I8PERoBkaFEp.jpg',
                'introduction' => '少し小さいです',
                'amount' => 1,
                'price' => 1500,
                'origin' => '福岡',
                'created_at' => '2021-07-04 21:45:41',
                'updated_at' => '2021-07-04 21:45:41',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'name' => '玉ねぎ',
                'image' => '85spSmPXX10PT3mmnjhD2dd7wbqZdXsYoYZpxbh3.jpg',
                'introduction' => '少し傷あり',
                'amount' => 1,
                'price' => 1000,
                'origin' => '佐賀',
                'created_at' => '2021-07-04 21:47:52',
                'updated_at' => '2021-07-04 21:47:52',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'name' => 'キャベツ',
                'image' => 'jFljwZ1WNm91AvwkcB4AarSM10n6qwp31m9w1QTm.jpg',
                'introduction' => '虫食いがあります',
                'amount' => 1,
                'price' => 500,
                'origin' => '大分',
                'created_at' => '2021-07-04 21:48:32',
                'updated_at' => '2021-07-04 21:48:32',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 6,
                'name' => '大根',
                'image' => 'zIQekDiTZ5jztGVX8pT7H6w0VmGYjFB4hsamRZrE.jpg',
                'introduction' => '変形しています',
                'amount' => 1,
                'price' => 500,
                'origin' => '熊本',
                'created_at' => '2021-07-05 17:04:19',
                'updated_at' => '2021-07-05 17:04:19',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 6,
                'name' => 'トマト',
                'image' => 'g7tuHnchYL9j4GuRgzJNswvfL5VXR4c0HTSMwyFO.jpg',
                'introduction' => '小さいですが、甘みがあるトマトです',
                'amount' => 1,
                'price' => 2000,
                'origin' => '熊本',
                'created_at' => '2021-07-05 17:05:08',
                'updated_at' => '2021-07-05 17:05:08',
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 4,
                'name' => 'かぼちゃ',
                'image' => 'dmgfHsLKewh5QKcRgRF39YBZPWztgZOs0Ru7v4ep.jpg',
                'introduction' => 'サイズが大きいです',
                'amount' => 1,
                'price' => 800,
                'origin' => '鹿児島',
                'created_at' => '2021-07-05 17:06:18',
                'updated_at' => '2021-07-05 17:06:18',
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'name' => 'オクラ',
                'image' => 'PDhQwDRYkU9SdP8a2To7ECDT83j3YNJW1CvT1C9h.jpg',
                'introduction' => '炒めるとおいしいです',
                'amount' => 1,
                'price' => 3000,
                'origin' => '佐賀',
                'created_at' => '2021-07-05 17:07:08',
                'updated_at' => '2021-07-05 17:07:08',
            ),
        ));
        
        
    }
}