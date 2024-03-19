<?php

namespace App\Livewire;

use App\Livewire\Forms\ProductsForm;
use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsCreate extends Component
{
    use WithFileUploads;

    public ProductsForm $form;
    public Collection $categories;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save(): void
    {
        $this->form->save();

        $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.products-create');
    }
}
