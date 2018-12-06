<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ChannelsTableSeeder::class);
        $this->call(ChannelTagTableSeeder::class);
        $this->call(UserChannelTableSeeder::class);
        $this->call(UserTagTableSeeder::class);
    }
}
