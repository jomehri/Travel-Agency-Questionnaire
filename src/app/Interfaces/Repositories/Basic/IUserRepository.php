<?php

namespace App\Interfaces\Repositories\Basic;

use App\Models\Basic\User;

interface IUserRepository
{
    /**
     * @param int $id
     * @return User
     */
    public function getUser(int $id): User;

    /**
     * @param array $data
     * @return User
     */
    public function register(array $data): User;

    /**
     * @param User $user
     * @param array $data
     * @return void
     */
    public function login(User $user, array $data): void;

}
