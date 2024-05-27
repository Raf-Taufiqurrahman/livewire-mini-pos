<?php

namespace App\Livewire\Pages\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Create extends Component
{
    use WithFileUploads;

    // define layout
    #[Layout('layouts.app')]
    // define title
    #[Title('Create Product')]

    // define property
    public $path = 'public/products/';
    public $name;
    public $image;
    public $categoryId;
    public $price;
    public $qty;

    // define validation
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:products',
            'price' => 'required',
            'categoryId' => 'required',
            'image' => 'required|image|max:2048',
            'qty' => 'required',
        ];
    }

    // define function save
    public function save()
    {
        // call validation
        $this->validate();

        // store image product
        $this->image->storeAs(path: $this->path, name: $this->image->hashName());

        // create new product data
        Product::create([
            'name' => $this->name,
            'slug' => str()->slug($this->name),
            'image' => $this->image->hashName(),
            'category_id' => $this->categoryId,
            'price' => $this->price,
            'qty' => $this->qty,
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

        // render view
        return view('livewire.pages.products.create', compact('categories'));
    }
}
