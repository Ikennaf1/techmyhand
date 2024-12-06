<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
// use App\Models\Wallet;

class Wallets extends Component
{
    public function render()
    {
        return view('livewire.portal.wallets')
            ->layout('components.layouts.portal')
            ->title('Wallet');
    }
}
