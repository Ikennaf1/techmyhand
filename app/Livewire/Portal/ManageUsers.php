<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Role;

class ManageUsers extends Component
{
    public $users;
    public $adminUsers;

    public function mount()
    {
        $this->users = User::orderBy('id', 'DESC')->limit(10)->get();
        $this->adminUsers = $this->getAdminUsers();
    }

    public function render()
    {
        return view('livewire.portal.manage-users')
            ->layout('components.layouts.portal')
            ->title('Manage Users');
    }

    private function getAdminUsers()
    {
        $users = new Collection;
        $roles = Role::all();
        $userRoles = UserRole::all();

        foreach ($userRoles as $userRole) {
            $user = User::find($userRole->user_id);
            $user->user_id = $user->id;
            $user->role = $user->roles->first()->name;
            $user->started_on = $userRole->created_at->diffForHumans();
            unset($user->roles);
            $users = $users->sortBy('role', SORT_NATURAL);
            $users = $users->merge([$user]);
        }

        return $users->all();
    }
}
