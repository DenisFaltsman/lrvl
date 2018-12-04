<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Tag;
use Illuminate\Http\Request;

/**
 * Class ChannelController
 * @package App\Http\Controllers
 */
class ChannelController extends Controller
{
    public function tags()
    {
        $tags = Tag::all();
        print_r($tags);
        exit;
    }

    public function channels()
    {
        $channels = Channel::all();

        foreach ($channels as $channel) {
            print_r($channel->user->name);
            $tags = $channel->tags;
//            foreach ($tags as $tag) {
//                print_r($tag->name);
//            }
        }
        print_r('<br><br><br>');

        exit;
    }

    public function update(Request $request)
    {
        // Валидируем запрос...

//        $this->validate($request, [
//            'auth_token' => 'required|alpha_dash',
//            'page'       => 'integer',
//            'limit'       => 'integer',
//            'type' => 'string|in:' . implode(',', array_keys(DoctrineOrder::getTypes())),
//        ]);

        $channel = new Channel();

        $channel->name = $request->name;

        $channel->save();
    }



}
