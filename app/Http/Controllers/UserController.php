<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();


        /** @var User $user */
        foreach ($users as $user) {
            echo $user->id . ' ' . $user->name . ' ';
            foreach($user->channels as $channel) {
                echo $channel->name . ', ';
            }
            echo '<hr>';
        }


        exit;

    }
}
