<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /*
     * @const
     */
    private const DEFAULT_PASSWORD = 'qwerty';


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        return view('users', ['users' => User::all()]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getChannelInfo(Request $request)
    {
//        $this->validate($request, [
//            'id' => 'required|integer',
//        ]);

        /** @var Channel $channel */
        $channel = Channel::find((int) $request->id);

        return view('singlechannel', ['users' => $channel->users, 'channelname' => $channel->name, 'tags' => $channel->tags]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profile()
    {
        /** @var User $user */
        $user = User::find(Auth::id());

        $entities = [];

        /** @var Tag $tag */
        foreach ($user->tags as $key => $tag) {
            $entities[$key]['tag'] = $tag->id;
            /** @var Channel $channel */
            foreach ($tag->channels as $channel) {
                $entities[$key]['channel'] = $channel->id;
            }
        }

        dd($entities);


        return view('profile', ['channels' => $user->channels, 'tags' => $user->tags, 'username' => $user->name]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUserAction(Request $request)
    {
        $this->validate($request, [
            'name'  => 'string|required',
            'email' => 'email|required',
        ]);

        $email = $request->email;
        $name  =  $request->name;


        if (User::where('email', '=', $email)->count() > 0) {
            return view('messages', ['message' => 'User with ' . $email . ' already exists']);
        }

        /** @var User $user */
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make(self::DEFAULT_PASSWORD);

        $user->save();

        $message = 'User with email ' . $email . ' and password ' . self::DEFAULT_PASSWORD . ' has been created by You.';

        return view('messages', ['message' => $message]);
    }
}