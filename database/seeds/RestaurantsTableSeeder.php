<?php

use Illuminate\Database\Seeder;

class RestaurantsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('restaurants')->delete();
        
        \DB::table('restaurants')->insert(array (
            0 => 
            array (
                'id' => 1,
                'restaurant_name' => 'ゲスト亭',
                'name' => 'ゲスト',
                'email' => 'restaurant_guest@example.jp',
                'password' => '$2y$10$m4ht17W4MlwvefsAl.GATu/NnaEmFqXtcyutS5a3gtKXQTdaiPPiW',
                'introduction' => '定食屋です',
                'image' => 'wNUNBP3MpYz22PxJEgPGZt4wckq1WQLurrNryXM7.jpg',
                'address' => '福岡県福岡市早良区',
                'created_at' => '2021-07-04 21:51:05',
                'updated_at' => '2021-07-04 21:51:05',
                'remember_token' => 'vCmumJxHXkil7fEdaO7kpnJAdK3Md6d9UlXv83ajBgtFONaLtDRp6BM6C4Aw',
            ),
            1 => 
            array (
                'id' => 2,
                'restaurant_name' => '山田亭',
                'name' => '山田',
                'email' => 'yamada@example.jp',
                'password' => '$2y$10$0VKILfS7bNRdSoYfjE80S.ZdbueharSprBRpFwjduvB.7hiWjxEla',
                'introduction' => '居酒屋やっています',
                'image' => 'pf3gK5x814PUQ2hg4h0CNmMG3pqY4WVV08GIs0qf.jpg',
                'address' => '福岡',
                'created_at' => '2021-07-05 11:57:02',
                'updated_at' => '2021-07-05 15:52:10',
                'remember_token' => 'sazjIOMcgOmdSQgESq8WbspnZLR9GgMVymuclZHWNlH9iMu67jkLw6W34SGA',
            ),
        ));
        
        
    }
}