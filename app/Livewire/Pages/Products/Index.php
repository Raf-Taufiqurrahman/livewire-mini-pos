<?php

namespace App\Livewire\Pages\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    // define layout
    #[Layout('layouts.app')]
    // define title
    #[Title('Products')]

    // define proprty
    #[Url]
    public $search;
    public $path = 'public/products/';

    // define function delete
    public function delete($id)
    {
        // get product data by id
        $product = Product::findOrFail($id);

        // delete product image
        Storage::disk('local')->delete($this->path.basename($product->image));

        // delete product data
        $product->delete();
    }

    public function render()
    {
        // table heads
        $table_heads = ['No', 'Name', 'Image', 'Category', 'Price', 'Qty', 'Action'];

        // list products data
        $products = Product::query()
            ->with('category')
            ->when($this->search, function($query){
                $query->whereAny(['name', 'price'], 'like', '%'. $this->search .'%')
                    ->orWhereHas('category', function($query){
                        $query->where('name', 'like', '%'. $this->search .'%');
                    });
            })
            ->latest()
            ->paginate(7);

        // render view
        return view('livewire.pages.products.index', compact('table_heads', 'products'));
    }
}
