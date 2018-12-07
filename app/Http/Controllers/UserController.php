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
    public function getChannels(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
        ]);

        /** @var User $user */
        $user = User::find($request->id);

        return view('singleuser', ['channels' => $user->channels, 'username' => $user->name]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function joinChannelAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
        ]);

        $channelName = $request->name;

        if (0 === Channel::where('name', '=', $channelName)->count()) {
            $message =  'Channel ' . $channelName . ' doesnt exist. You can create this channel use link on the Top menu.';
            return view('messages', ['message' => $message]);
        }

        /** @var Channel $channelEntity */
        $channelEntity = Channel::where('name', '=', $channelName)->first();
        $channelEntity->users()->sync(['user_id' => Auth::id()], false);
        $message = 'You are joined to ' . $channelEntity->name;

        return view('messages', ['message' => $message]);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function leftChannelAction(Request $request)
    {
        $this->validate($request, [
            'id' => 'integer|required',
        ]);

        $channelId = $request->id;
        /** @var Channel $channel */
        $channel   = Channel::find($channelId);

        /** @var User $user */
        $user = User::find(Auth::id());
        $user->channels()->detach($channelId);


        //Deleting if channel have no joined users
        if (0 === $channel->users->count()) {
            Channel::find($channelId)->delete();
        }

        $message = 'Youre left from channel ' . $channel->name;
        return view('messages', ['message' => $message]);
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
