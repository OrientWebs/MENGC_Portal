<?php

namespace App\Livewire\Admin;

use App\Services\UserService;
use App\Http\Requests\Users\UserStoreRequest;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Livewire\Admin\Base\BaseComponent;

class UserComponent extends BaseComponent
{
    public $name, $email, $role, $password, $user_id, $role_id, $is_active,  $prePage;
    public $search = '', $filterRole = '', $filterDate = '';
    protected $indexRoute = "admin/users";
    protected $createRoute, $editRoute, $showRoute;
    protected UserService $userService;
    public function boot(UserService $userService)
    {
        $this->verifyAuthorization('user-access');
        $this->userService = $userService;
    }
    public function mount()
    {
        $this->createRoute = "{$this->indexRoute}/create";
        $this->editRoute   = "{$this->indexRoute}/edit/*";
        $this->showRoute   = "{$this->indexRoute}/show/*";

        $this->determineCurrentPage([
            $this->createRoute => 'create',
            $this->editRoute   => 'edit',
            $this->showRoute   => 'show'
        ]);
    }
    public function changeRole() {}

    public function toggleActive($id)
    {
        $this->verifyAuthorization('user-edit');
        $user = $this->userService->findUser($id);
        $user->is_active = !$user->is_active;
        $user->save();

        $this->flashMessage('success', 'Status Update successfully!');
        return $this->redirectRoute('admin.users', navigate: true);
    }
    public function create()
    {
        $this->verifyAuthorization("user-create");
        $this->reset(['name', 'email', 'password', 'user_id']);
        $this->verifyAuthorization("user-create");
    }

    public function store()
    {
        $this->verifyAuthorization("user-create");
        $validated = UserStoreRequest::validate($this);
        $this->userService->createUser($validated);

        $this->flashMessage('success', 'User create successfully!');
        return $this->redirectRoute('admin.users', navigate: true);
    }

    public function edit($id)
    {
        $this->verifyAuthorization("user-edit");
        $user = $this->userService->findUser($id);
        $this->user_id = $user->id;
        $this->name    = $user->name;
        $this->role_id = $user->roles->first()->id;
        $this->email   = $user->email;
    }

    public function update()
    {
        $this->verifyAuthorization("user-edit");
        // set user id before validate
        UserUpdateRequest::withId($this->user_id);
        $validated = UserUpdateRequest::validate($this);
        $this->userService->updateUser($this->user_id, $validated);

        $this->flashMessage('success', 'User update successfully!');
        return $this->redirectRoute('admin.users', navigate: true);
    }


    public function delete($id)
    {
        $this->verifyAuthorization("user-delete");
        $this->userService->deleteUser($id);

        $this->flashMessage('success', 'User delete successfully!');
        return $this->redirectRoute('admin.users', navigate: true);
    }

    public function render()
    {
        switch ($this->currentPage) {
            case 'create':
                $roles = $this->userService->getRoleList()->pluck('name', 'id');
                return view('admin.user.create', compact('roles'));
            case 'edit':
                $roles = $this->userService->getRoleList()->pluck('name', 'id');
                return view('admin.user.edit', compact('roles'));
            case 'show':
                return view('admin.user.show');
            default:
                $users = $this->userService->listUsers($this->prePage, $this->search, $this->filterRole, $this->filterDate);
                $roles = $this->userService->getRoleList();
                return view('admin.user.index', compact('users', 'roles'));
        }
    }
}
