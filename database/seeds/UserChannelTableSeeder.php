<?php

use Illuminate\Database\Seeder;

class UserChannelTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_channel')->delete();
        
        \DB::table('user_channel')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'channel_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'channel_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 2,
                'channel_id' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 2,
                'channel_id' => 4,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'channel_id' => 5,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 2,
                'channel_id' => 1,
            ),
        ));
        
        
    }
}