<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserFriend extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'friends' => $this->friends,
        ];
    }

    public function with($request)
    {
        return [
            'version' => '1.0.0',
            'author_url' => url('http://useinsider.com')
        ];
    }
}
