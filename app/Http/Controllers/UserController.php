<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getUsers(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        /** @var Channel $channel */
        $channel = Channel::find($request->id);

        return view('singlechannel', ['users' => $channel->users, 'channelname' => $channel->name]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        /** @var User $user */
        $user = User::find(Auth::id());

        return view('profile', ['channels' => $user->channels, 'tags' => $user->tags, 'username' => $user->name]);
    }
}
