<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App\Models
 */
class Channel extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'channels';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_channel', 'channel_id','user_id' );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'channel_tag', 'channel_id', 'tag_id');
    }
}
