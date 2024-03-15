<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProductsCreate extends Component
{
    #[Validate('required|min:3')]
    public string $name = '';
    #[Validate('required|min:3')]
    public string $description = '';
    #[Validate('required|exists:categories,id', as: 'category')]
    public int $category_id;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->validate();

        Product::create($this->only(['name', 'description', 'category_id']));

        $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.products-create');
    }
}
