<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class SideNav extends Component
{
    public $portalName;

    public function mont()
    {
        $portalPath = request()->getRequestUri();
        $portalName = explode('/', request()->getRequestUri());
        $this->portalName = $portalName[count($portalName) - 1];
    }

    public function render()
    {
        return view('livewire.portal.side-nav');
    }
}
