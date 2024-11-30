<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Role;
use Livewire\Attributes\Validate;

class EditRole extends Component
{
    public $role;

    #[Validate('required|min:2|max:72')]
    public $name;

    public function mount($role)
    {
        $this->role = Role::find($role);
        $this->name = $this->role->name;
    }

    public function edit()
    {
        $this->validate();

        $this->role->update([
            'name' => $this->name
        ]);

        session()->flash('portal_status', 'Role successfully edited.');
    }

    public function render()
    {
        return view('livewire.portal.edit-role')
            ->layout('components.layouts.portal')
            ->title('Edit role');
    }
}
