<?php

use Illuminate\Database\Seeder;

class ChannelTagTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('channel_tag')->delete();
        
        \DB::table('channel_tag')->insert(array (
            0 => 
            array (
                'id' => 1,
                'tag_id' => 1,
                'channel_id' => 2,
            ),
            1 => 
            array (
                'id' => 2,
                'tag_id' => 1,
                'channel_id' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'tag_id' => 3,
                'channel_id' => 2,
            ),
            3 => 
            array (
                'id' => 4,
                'tag_id' => 4,
                'channel_id' => 1,
            ),
        ));
        
        
    }
}