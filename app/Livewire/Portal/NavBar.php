<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class NavBar extends Component
{
    public function render()
    {
        $portalPath = request()->getRequestUri();
        $portalName = explode('/', request()->getRequestUri())[1];
        $portalScriptName = ltrim($portalPath, '/portal');
        
        return view('livewire.portal.nav-bar', [
            'portalName' => $portalName,
            'portalScriptName' => $portalScriptName
        ]);
    }
}
