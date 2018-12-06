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
                'name' => 'name',
                'user_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'name2',
                'user_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'name3',
                'user_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'name4',
                'user_id' => 2,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'name5',
                'user_id' => 2,
            ),
        ));
        
        
    }
}