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
                'password' => '$2y$10$kxUbkCEG60RBIz.UXLvVDuVp5kWBUIduRRNUbm3WOE930EdJPlf8e',
                'remember_token' => 'GEvHOXPfZNwuFm8LHibaIVe72mPLfawrIic5M0elFd9g4oRbhj4ssrF7xoN5',
                'created_at' => '2018-12-06 13:53:24',
                'updated_at' => '2018-12-06 13:53:24',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'observer',
                'email' => 'arkadiy@mail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$l.1KTaatcEYCvwxdC7sHQOqCqlZ8sBpc8PdxtrskX7JVyNspupsEK',
                'remember_token' => NULL,
                'created_at' => '2018-12-06 13:54:37',
                'updated_at' => '2018-12-06 13:54:37',
            ),
        ));
        
        
    }
}