<?php

namespace App\Models\User;

use App\Scopes\FriendshipStatusScope;
use Illuminate\Database\Eloquent\Model;

class Friendship extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new FriendshipStatusScope);
    }

    public function senderUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function acceptorUser()
    {
        return $this->hasOne(User::class, 'id', 'friend_id');
    }

    public function senderUserSocialContact()
    {
        return $this->hasMany(SocialContact::class, 'user_id', 'user_id');
    }

    public function acceptorUserSocialContact()
    {
        return $this->hasMany(SocialContact::class, 'user_id', 'friend_id');
    }

    public function socialContact()
    {
        return $this->hasMany(SocialContact::class, 'user_id', 'user_id');
    }

    //protected $hidden = ['id', 'user_id', 'id', 'status', 'friend_id', 'created_at', 'updated_at'];
}
