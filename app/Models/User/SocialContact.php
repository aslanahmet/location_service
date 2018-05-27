<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class SocialContact extends Model
{
    protected $table = 'social_contact';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}
