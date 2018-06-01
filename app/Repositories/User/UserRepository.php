<?php

namespace App\Repositories\User;

use App\Http\Resources\User as UserResource;
use App\Models\User\User;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param $value
     * @param $request
     * @param $requestType
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|object|static
     */
    public function getUserByRequestType($requestType, $value, $request)
    {
        $user = User::where($requestType, $value)
            ->with('sender.acceptorUser', 'acceptor.senderUser')->first();
        $this->addFriendsToUserInstance($user);

        return $user;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|mixed|null|object|static
     */
    public function getUserFriendById($id)
    {
        $user = User::where('id', $id)->
        with('sender.acceptorUser', 'acceptor.senderUser', 'sender.acceptorUserSocialContact',
            'acceptor.senderUserSocialContact'
        )
            ->first();
        $this->addFriendsToUserInstance($user);

        return $user;
    }

    /**
     * @param $request
     * @return UserResource|mixed
     */
    public function addUser($request)
    {
        $user = $request->isMethod('put') ? User::findOrFail($request->id) : new User;
        $user->first_name = $request->input('firstName');
        $user->last_name = $request->input('lastName');
        $user->gender = $request->input('gender');
        $user->password = $request->input('password');
        $user->save();

        return new UserResource($user);
    }

    /**
     * @param $id
     * @return UserResource|mixed
     * @throws \Exception
     */
    public function deleteUserById($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return new UserResource($user);
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function validateUserSearchParameter($request)
    {
        $request->validate([
            'type' => 'required|max:255|email',
        ]);
    }

    /**
     * @param $user
     * @return mixed
     */
    private function addFriendsToUserInstance($user)
    {
        $friends = collect();
        $friends->friendsSocialContacts = collect();
        $user->sender->each(function ($sender) use ($friends) {
            $friends->push($sender->acceptorUser);
            $friends->friendsSocialContacts->push($sender->acceptorUserSocialContact);
        });
        $user->acceptor->each(function ($acceptor) use ($friends) {
            $friends->push($acceptor->senderUser);
            $friends->friendsSocialContacts->push($acceptor->senderUserSocialContact);
        });
        unset($user->sender, $user->acceptor);
        $user->friends = $friends;

        return $user;
    }
}