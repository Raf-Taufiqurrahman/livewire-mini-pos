<?php

namespace App\Livewire\Pages\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    // define layout
    #[Layout('layouts.app')]
    // define title
    #[Title('Edit Product')]

    // define property
    public Product $product;
    public $path = 'public/products/';
    public $name;
    public $image;
    public $categoryId;
    public $price;

    // define lifecycle hooks
    public function mount()
    {
        // assign proprty with product data
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->categoryId = $this->product->category_id;
    }

    // define valdiation
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:products,name,'.$this->product->id,
            'image' => 'nullable|image|max:2048',
            'price' => 'required',
            'categoryId' => 'required',
        ];
    }

    // define function update
    public function update()
    {
        // call validation
        $this->validate();

        if($this->image){
            // delete old image
            Storage::disk('local')->delete($this->path.basename($this->category->image));

            // store new image
            $this->image->storeAS(path: $this->path, name: $this->image->hashName());

            // update product image
            $this->product->update([
                'image' => $this->image->hashName(),
            ]);
        }

        // update product data
        $this->product->update([
            'name' => $this->name,
            'slug' => str()->slug($this->name),
            'price' => $this->price,
            'category_id' => $this->categoryId,
        ]);

        // render view
        return $this->redirect('/products', navigate:true);
    }

    public function render()
    {
        // list categories data
        $categories = Category::query()
            ->select('id', 'name')
            ->orderBy('name')->get();

        return view('livewire.pages.products.edit', compact('categories'));
    }
}
