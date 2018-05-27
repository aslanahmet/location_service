<?php

namespace App\Repositories\User;

interface UserRepositoryInterface
{
    /**
     * @param $value
     * @param $request
     * @param $requestType
     * @return mixed
     */
    public function getUserByRequestType($requestType, $value, $request);

    /**
     * @param $id
     * @return mixed
     */
    public function getUserFriendById($id);

    /**
     * @param $request
     * @return mixed
     */
    public function addUser($request);

    /**
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id);

    /**
     * @param $request
     * @return mixed
     */
    public function validateUserSearchParameter($request);
}