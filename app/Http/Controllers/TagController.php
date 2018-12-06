<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class TagController
 * @package App\Http\Controllers
 */
class TagController extends Controller
{
    /**
     * TagController constructor.
     */
    public function __construct()
    {
        // А можно было и через роуты
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createTag(Request $request)
    {
        $channels = Channel::all();

        return view('createtag', ['channels' => $channels]);
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createTagAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'channel_id' => 'integer|required'
        ]);
        $tagName =   $request->name;
        $channelId = $request->channel_id;

        echo 'tagName' . $tagName . ' Channel Id ' . $channelId;
        exit;

        $userId =    Auth::id();

        /** @var Tag $tag */
        $tag = Tag::where('name', '=', $tagName);

        /** @var User $user */
        $user = User::find($userId);

        /** @var Channel $channel */
        $channel = Channel::find($channelId);


        if (0 === $tag->count()) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->users()->save($tag);
            $tag->channels()->save($channel);
        }
    }
}
