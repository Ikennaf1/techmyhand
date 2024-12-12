<?php

namespace App\Livewire\Portal;

use Livewire\Component;
use App\Models\Product;

class Products extends Component
{
    public $products;

    public function mount()
    {
        $this->refreshComponent();
    }

    public function approve($id)
    {
        $product = Product::find($id);

        if ($product !== null && $product->status !== 'approved') {
            $product->update([
                'status' => 'approved'
            ]);
            session()->flash('portal_status', 'Product successfully approved.');
        } else {
            session()->flash('portal_status', 'Product can not be approved.');
        }

        $this->refreshComponent();
    }

    public function suspend($id)
    {
        $product = Product::find($id);

        if ($product !== null && $product->status === 'approved') {
            $product->update([
                'status' => 'suspended'
            ]);
            session()->flash('portal_status', 'Product successfully suspended.');
        } else {
            session()->flash('portal_status', 'Product can not be suspended.');
        }

        $this->refreshComponent();
    }

    public function render()
    {
        return view('livewire.portal.products')
            ->layout('components.layouts.portal')
            ->title('Products');
    }

    private function refreshComponent()
    {
        $this->products = Product::latest()->limit(10)->get();
    }
}
