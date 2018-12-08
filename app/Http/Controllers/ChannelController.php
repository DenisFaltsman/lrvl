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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function channels()
    {
        return view('channels', ['channels' => Channel::all()]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getChannels(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|integer',
        ]);

        /** @var User $user */
        $user = User::find($request->user_id);

        return view('singleuser', ['channels' => $user->channels, 'username' => $user->name]);
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
            return view('messages',
                ['message' => 'Channel ' . $channelName . ' already exists']
            );
        }

        $userId = Auth::id();

        $channel = new Channel();
        $channel->name = $channelName;
        $channel->user_id = $userId;

        /** @var User $user */
        $user = User::find($userId);

        $user->channels()->save($channel);

        return view('messages',
            ['message' => 'Channel ' . $channelName . ' has been created by You.']
        );
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
            return view('messages',
                ['message' => 'Channel ' . $channelName . ' doesnt exist. You can create this channel use link on the Top menu.']
            );
        }

        /** @var Channel $channelEntity */
        $channelEntity = Channel::where('name', '=', $channelName)->first();
        if ($channelEntity->users()->where('user_id', Auth::id())->exists()) {
            return view('messages', ['message' => 'You already joined on this channel']);
        }

        $channelEntity->users()->sync(['user_id' => Auth::id()], false);

        return view('messages', ['message' => 'You are joined to ' . $channelEntity->name]);
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

        $channelId = $request->input('channel_id');

        /** @var Channel $channel */
        $channel   = Channel::find($channelId);

        /** @var User $user */
        $user = User::find(Auth::id());
        $user->channels()->detach($channelId);

        //Deleting if channel have no joined users
        if (0 === $channel->users->count()) {
            Channel::find($channelId)->delete();
        }

        return view('messages', ['message' => 'Youre left from channel ' . $channel->name]);
    }
}
