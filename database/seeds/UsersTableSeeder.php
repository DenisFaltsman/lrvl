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
                'name' => 'Denis',
                'email' => 'faltsman@yandex.ru',
                'email_verified_at' => NULL,
                'password' => '$2y$10$IfptEWRtha0zaFzsQTxm.eTLqutX.L3lYixJ0o7FyUJJgn0GrM5wK',
                'remember_token' => 'HUn4ZvrU1Ao0fguggMKxShAmT5ld37cbRH1P0n1w59J5q4AbeJ0DGAcRlDlx',
                'created_at' => '2018-12-03 06:59:32',
                'updated_at' => '2018-12-03 06:59:32',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Miha',
                'email' => 'miha@email.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$4Ss.VE1T3mhZiU8UhRscXOdpxcoZ67hBBRGS/LQKrsqhJ6/FUe446',
                'remember_token' => 'N31WttN73yNvbfZYCIKT8weKphu2oQwrsEUTIHALZoQ16uqsbOWzzinMhfaz',
                'created_at' => '2018-12-04 07:21:02',
                'updated_at' => '2018-12-04 07:21:02',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Arkadiy',
                'email' => 'arkadiy@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$aHEUqC0quQlSF.JrJr4NjeHuHn4Rmc6odJyqOjy3AiGINXMVnZlQy',
                'remember_token' => NULL,
                'created_at' => '2018-12-04 07:21:31',
                'updated_at' => '2018-12-04 07:21:31',
            ),
        ));
        
        
    }
}