<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class SideNav extends Component
{
    public function render()
    {
        $portalPath = request()->getRequestUri();
        $portalName = explode('/', request()->getRequestUri());
        $portalName = $portalName[count($portalName) - 1];

        return view('livewire.portal.side-nav', [
            'portalName' => $portalName
        ]);
    }
}
