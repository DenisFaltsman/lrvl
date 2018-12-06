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
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createTag(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'channel_id' => 'integer|required'
        ]);
        $tagName =   $request->name;
        $channelId = $request->channel_id;
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
