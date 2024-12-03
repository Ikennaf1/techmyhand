<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;

class EditUserRole extends Component
{
    public $user;
    public $roles;
    public $userRole;
    public $selectedUserRoleID;

    public function mount($user)
    {
        $this->refreshComponent($user);
    }

    public function update()
    {
        $this->unadmin($this->user);

        if (Role::find($this->selectedUserRoleID) !== null) {
            $userRole = UserRole::create([
                'user_id' => $this->user->id,
                'role_id' => $this->selectedUserRoleID
            ]);
        }

        session()->flash('portal_status', 'User role successfully updated.');

        $this->refreshComponent($this->user->id);
    }

    public function unadmin($user)
    {
        $userRoles = UserRole::where('user_id', $user->id)->get();

        if ($userRoles !== null) {
            foreach ($userRoles as $userRole) {
                $userRole->delete();
            }
        }
    }

    public function render()
    {
        return view('livewire.portal.edit-user-role')
            ->layout('components.layouts.portal')
            ->title('Edit user role');
    }

    private function refreshComponent($user)
    {
        $this->user = User::findOrFail($user);
        $this->roles = Role::all();
        $userRole = $this->user->roles->first();
        $this->userRole = $userRole !== null
            ? $userRole->name
            : null;

        $this->selectedUserRoleID = $this->userRole !== null
            ? $userRole->id
            : 0;
    }
}
