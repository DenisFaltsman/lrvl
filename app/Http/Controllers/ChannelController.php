<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ChannelController
 * @package App\Http\Controllers
 */
class ChannelController extends Controller
{
    /**
     * ChannelController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function channels()
    {
        $channels = Channel::all();

        return view('channels', ['channels' => $channels]);
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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createChannelAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
        ]);

        $channelName = $request->name;
        if (Channel::where('name', '=', $channelName)->count() > 0) {
            $message =  'Channel ' . $channelName . ' already exists';
            return view('messages', ['message' => $message]);
        }

        $userId = Auth::id();

        $channel = new Channel();
        $channel->name = $channelName;
        $channel->user_id = $userId;

        /** @var User $user */
        $user = User::find($userId);

        $user->channels()->save($channel);

        $message = 'Channel ' . $channelName . ' has been created by You.';

        return view('messages', ['message' => $message]);
    }
}
