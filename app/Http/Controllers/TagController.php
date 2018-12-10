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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createTag()
    {
        return view('createtag', ['channels' => Channel::all()]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tags()
    {
        return view('tags', ['tags' => Tag::all()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getTagInfo(Request $request)
    {
        /** @var Tag $tag */
        $tag = Tag::find((int) $request->id);

        return view('singletag', ['channels' => $tag->channels, 'tagname' => $tag->name, 'users' => $tag->users]);
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

        /** @var array $collectionTags */
        $collectionTags = Tag::where('name', '=', $tagName);

        /** @var Channel $channel */
        $channel = Channel::find($channelId);

        /** @var Tag $tag */
        if (0 === $collectionTags->count()) {
            $tag = new Tag();
            $tag->name = $tagName;
            $tag->save();
        } else {
            $tag = $collectionTags->first();
        }

        $tag->users()->sync(['user_id' => $userId], false);
        $tag->channels()->sync(['channel_id' => $channelId], false);
        $tag->save();

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
//        $this->validate($request, [
//            'id' => 'integer|required'
//        ]);
        //а можно и с валидатором

        $tagId   = (int) $request->id;
        $channelId = (int) $request->channel;
        $userId    = Auth::id();

        echo 'Tag id: ' . $tagId . ' Channel Id: ' . $channelId;



        exit;


//        return view('messages',
//            ['message' => 'Tag ' . $tagName . ' for channel ' . $channel->name . ' has been created.']
//        );
    }


}
