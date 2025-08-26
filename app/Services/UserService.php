<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getRoleList()
    {
        $role = $this->userRepository->getRole()->all();
        return $role;
    }

    public function listUsers($perPage = 10, $search = null, $role = null, $date = null)
    {
        return $this->userRepository->searchUsers($perPage, $search, $role, $date);
    }

    public function createUser(array $data)
    {
        // Hash password
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->create($data);

        $role = $this->userRepository->getRole()->find($data['role_id']);
        if ($role) {
            $user->assignRole($role->name);
        }
        return $user;
    }

    public function updateUser($id, array $data)
    {
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
        $user = $this->userRepository->update($id, $data);
        $role = $this->userRepository->getRole()->find($data['role_id']);
        if ($role) {
            $user->syncRoles([$role->name]);
        }
        return $user;
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }

    public function findUser($id)
    {
        return $this->userRepository->getById($id);
    }
}
