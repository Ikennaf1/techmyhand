<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use App\Models\Wallet;

class Wallets extends Component
{
    public $balance = 0;
    public $user;

    public function mount()
    {
        $user = Auth::user();
        $this->balance = $user->wallet->balance;
    }

    public function render()
    {
        return view('livewire.portal.wallets')
            ->layout('components.layouts.portal')
            ->title('Wallet');
    }
}
