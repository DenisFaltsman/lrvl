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
        return view('createtag', ['channels' => Channel::all()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createTagAction(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'channel_id' => 'integer|required'
        ]);
        $tagName   = $request->name;
        $channelId = $request->channel_id;
        $userId    = Auth::id();

        /** @var Tag $tag */
        $tag = Tag::where('name', '=', $tagName);

        /** @var Channel $channel */
        $channel = Channel::find($channelId);

        if (0 === $tag->count()) {
            $tag = new Tag();
            $tag->name = $tagName;
        }

        //@todo думаю можно как-то лучше запилить
        $tag->users()->save($tag);
        $tag->users()->sync(['user_id' => $userId]);
        $tag->channels()->save($channel);
        $tag->channels()->sync(['channel_id' => $channelId]);

        return view('messages',
            ['message' => 'Tag ' . $tagName . ' for channel ' . $channel->name . ' has been created.']
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function removeTagAction(Request $request)
    {
        $this->validate($request, [
            'id' => 'integer|required'
        ]);
        $tagId   = $request->id;
        $userId    = Auth::id();

        echo 'Remove Tag id . ' . $tagId;
        exit;

        return view('messages',
            ['message' => 'Tag ' . $tagName . ' for channel ' . $channel->name . ' has been created.']
        );
    }


}
