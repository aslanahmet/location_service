<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserFriend;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User\User;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\UserFriend as UserFriendResource;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{

    /**
     * @param UserRepositoryInterface $userRepository
     * @param  \Illuminate\Http\Request $request
     */
    public function store(UserRepositoryInterface $userRepository, Request $request)
    {
        $userRepository->addUser($request);
    }

    /**
     * @param UserRepositoryInterface $userRepository
     * @param $id
     * @return mixed
     */
    public function getUserFriends(UserRepositoryInterface $userRepository, $id){
        $friends = $userRepository->getUserFriendById($id);
        return $friends;
        //return new UserFriendResource($friends);

    }

    /**
     *@param UserRepositoryInterface $userRepository
     * @param  int $value
     * @param Request $request
     * @return object
     */
    public function show(UserRepositoryInterface $userRepository,$searchType, $value, Request $request)
    {
        $user = $userRepository->getUserByRequestType($searchType, $value, $request);

        return new UserResource($user);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param UserRepositoryInterface $userRepository
     * @param  int $id
     */
    public function destroy(UserRepositoryInterface $userRepository, $id)
    {
        $userRepository->deleteUserById($id);
    }
}
