<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public function render()
    {
        return view('livewire.products', [
            'products' => Product::paginate(10),
        ]);
    }
}
