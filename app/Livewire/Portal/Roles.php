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

    private function refreshComponent()
    {
        $this->roles = Role::all();
    }
}
