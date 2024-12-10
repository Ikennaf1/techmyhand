<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use App\Models\Wallet;
use Paystack;

class Wallets extends Component
{
    public $balance = 0;
    public $user;
    public $orderID;
    public $reference;

    public function mount()
    {
        $this->user = Auth::user();
        $this->balance = $this->user->wallet->balance;
        $this->reference = Paystack::genTranxRef();
        $this->orderID = $this->reference;
    }

    public function render()
    {
        return view('livewire.portal.wallets')
            ->layout('components.layouts.portal')
            ->title('Wallet');
    }
}
