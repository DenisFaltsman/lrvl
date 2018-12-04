<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'summer',
                'channel_id' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'winter',
                'channel_id' => 2,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'autumn',
                'channel_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'spring',
                'channel_id' => 3,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'air',
                'channel_id' => 1,
            ),
        ));
        
        
    }
}