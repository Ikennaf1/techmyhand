<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;

class Roles extends Component
{
    public $roles;
    public $adminUsers;

    #[Validate('required|min:2|max:72')]
    public $roleName;

    public function mount()
    {
        $this->refreshComponent();
    }

    public function add()
    {
        $this->authorize('create', Role::class);

        $this->validate();

        $role = Role::updateOrCreate(
            ['name' => $this->roleName],
            [
                'name' => $this->roleName,
                'created_by' => Auth::user()->id
            ]
        );

        session()->flash('portal_status', 'Role successfully created.');

        $this->refreshComponent();
    }

    public function delete($id)
    {
        $this->authorize('delete', Role::class);

        $role = Role::find($id);

        $role = $role->delete();

        session()->flash('portal_status', 'Role successfully deleted.');

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
            $user->user_id = $user->id;
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
        $this->adminUsers = $this->getAdminUsers();
    }
}
