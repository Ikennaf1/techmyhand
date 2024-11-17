<?php

namespace App\Livewire\Portal;

use Livewire\Component;

class NavBar extends Component
{
    public $pageTitle;

    public function render()
    {
        $portalPath = request()->getRequestUri();
        $portalName = explode('/', request()->getRequestUri())[1];
        $portalScriptName = str_replace('/portal/', '', $portalPath);
        
        return view('livewire.portal.nav-bar', [
            'portalName' => $portalName,
            'portalScriptName' => $portalScriptName
        ]);
    }
}
