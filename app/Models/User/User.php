<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function sender()
    {
        return $this->hasMany(Friendship::class, 'user_id', 'id');
    }

    public function acceptor()
    {
        return $this->hasMany(Friendship::class, 'friend_id', 'id');
    }

    public function socialContact()
    {
        return $this->hasMany(SocialContact::class, 'user_id', 'id');
    }

    protected $hidden = ['password', 'created_at', 'updated_at'];
}
