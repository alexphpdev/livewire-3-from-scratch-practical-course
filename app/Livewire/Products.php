<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Livewire\Attributes\Session;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public Collection $categories;
    #[Session]
    public string $searchQuery = '';
    public int $searchCategory = 0;

    public function mount(): void
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function appropriateCategories(): Collection
    {
        if (!$this->searchQuery) {
            return $this->categories;
        }

        return Category::query()
            ->distinct()
            ->join('category_product', 'categories.id', 'category_product.category_id')
            ->join('products', 'category_product.product_id', 'products.id')
            ->where('products.name', 'like', '%'. $this->searchQuery .'%')
            ->orderBy('categories.name')
            ->pluck('categories.name', 'categories.id');
    }

    public function updating($key): void
    {
        if ($key === 'searchQuery' || $key === 'searchCategory') {
            $this->resetPage();
        }
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }

    public function render()
    {
        $products = Product::with('categories')
            ->when($this->searchQuery !== '', fn(Builder $query) => $query->where('name', 'like', '%'. $this->searchQuery .'%'))
            ->when($this->searchCategory > 0, function (Builder $query) {
                $query->whereHas('categories', function (Builder $query2) {
                    $query2->where('id', $this->searchCategory);
                });
            })
            ->orderByDesc('id')
            ->paginate(10);

        if ($this->searchQuery !== '' || $this->searchCategory > 0) {
            sleep(2);
        }

        return view('livewire.products', [
            'products' => $products,
        ]);
    }
}
