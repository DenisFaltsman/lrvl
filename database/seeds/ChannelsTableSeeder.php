<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('channels')->delete();
        
        \DB::table('channels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'One Channel',
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Second Channel',
                'user_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Third Channel',
                'user_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Fourth Channel',
                'user_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Five Channel',
                'user_id' => 3,
            ),
        ));
        
        
    }
}