<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'producer_name' => 'ゲスト農園',
                'name' => 'ゲスト',
                'introduction' => 'ジャガイモ作っています',
                'image' => '80NhT9tyG7mR75ZwcYfvUanGPs7uedLZuzXRgYEE.jpg',
                'address' => '福岡県',
                'email' => 'guest@example.jp',
                'password' => '$2y$10$zmWcPI21wsddEs0VTRinK.0LikCe0FlZXW4qrwHuHAPAhh2QWVNq.',
                'remember_token' => NULL,
                'created_at' => '2021-07-04 21:44:43',
                'updated_at' => '2021-07-04 21:44:43',
            ),
            1 => 
            array (
                'id' => 2,
                'producer_name' => '山口農園',
                'name' => '山口',
                'introduction' => 'なすび作っています
よろしくお願いします',
                'image' => 'UEkEXmhavMU7jEPtk0mo66aH1Tj2d9rF6myzaldZ.jpg',
                'address' => '熊本県',
                'email' => 'yamaguchi@example.jp',
                'password' => '$2y$10$ExnJbVMWeAa3VEig6uotUOmMMFhETckDAgApjl5HyijgFhOgRu2Pm',
                'remember_token' => '29wIiRkeAKTgAIpBtvNDuNJLiqMeRGEy2DNOBoJGaZsm565ZoR1sWXHkT3sA',
                'created_at' => '2021-07-04 23:13:01',
                'updated_at' => '2021-07-05 16:12:39',
            ),
            2 => 
            array (
                'id' => 3,
                'producer_name' => '佐藤農園',
                'name' => '佐藤',
                'introduction' => 'オクラ生産しています',
                'image' => 'TYEq04EHLmWctr7RvduWdb8a9uyECWCz24m3sn2k.jpg',
                'address' => '佐賀県',
                'email' => 'sato@example.jp',
                'password' => '$2y$10$ia1JMUjmt0YMZgUPuWvrl.ppJcC/RXr94KbTFqwpSR6cNPLOR6qpK',
                'remember_token' => NULL,
                'created_at' => '2021-07-05 16:58:24',
                'updated_at' => '2021-07-05 16:58:24',
            ),
            3 => 
            array (
                'id' => 4,
                'producer_name' => '木村農園',
                'name' => '木村',
                'introduction' => 'トマト生産しています',
                'image' => 'ldgTjfIyWCJzDGRC8akLfPcQ87a6rTJOgcrE275R.jpg',
                'address' => '大分県',
                'email' => 'kimura@example.jp',
                'password' => '$2y$10$.ksGGY26vUa.Dh6B4rVWm.vjIzlHg.6z15zsLinuZ4q4LC6vFWKHe',
                'remember_token' => 't7atec2c3XbDLfUJ3k9GjhnEJQh8rdo8OFLtiWfCwKpQCFKFlNnU3pXtEcTc',
                'created_at' => '2021-07-05 16:59:34',
                'updated_at' => '2021-07-05 16:59:34',
            ),
            4 => 
            array (
                'id' => 5,
                'producer_name' => '田中農園',
                'name' => '田中',
                'introduction' => '大根生産しています',
                'image' => 'AdDpXnZwUofRYd0cQrtps5tWf1m2whMqsafFhFLE.jpg',
                'address' => '鹿児島',
                'email' => 'tanaka@example.jp',
                'password' => '$2y$10$q7CwQgGHn4kFJpboNmNB9.fDWBF7hXhcblegAXI.MjdCPsTyGuDvG',
                'remember_token' => NULL,
                'created_at' => '2021-07-05 17:01:07',
                'updated_at' => '2021-07-05 17:01:07',
            ),
            5 => 
            array (
                'id' => 6,
                'producer_name' => '上田農園',
                'name' => '上田',
                'introduction' => '上田です',
                'image' => 'u7tMUADzsZbxCXyx5lHwy9lan6NlhGloxsC9IFjy.jpg',
                'address' => '熊本',
                'email' => 'ueda@example.jp',
                'password' => '$2y$10$.S1wYrbeJuxc4n1Xk/UvTe5cNBqkrSkCJ62HqD6tEOg8uUyND3jqO',
                'remember_token' => NULL,
                'created_at' => '2021-07-05 17:03:07',
                'updated_at' => '2021-07-05 17:03:07',
            ),
        ));
        
        
    }
}