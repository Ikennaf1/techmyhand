<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Collection;

class Roles extends Component
{
    public $roles;
    public $users;

    public function mount()
    {
        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.portal.roles')
            ->layout('components.layouts.portal')
            ->title('Roles');
    }

    private function getAdminUsers()
    {
        $users = new Collection;
        $roles = Role::all();
        $userRoles = UserRole::all();

        foreach ($userRoles as $userRole) {
            $user = User::find($userRole->user_id);
            $user->role = $user->roles->first()->name;
            $user->started_on = $userRole->created_at->diffForHumans();
            unset($user->roles);
            $users = $users->sortBy('role', SORT_NATURAL);
            $users = $users->merge([$user]);
        }

        return $users->all();
    }

    private function refreshComponent()
    {
        $this->roles = Role::all();
        $this->users = $this->getAdminUsers();
    }
}
