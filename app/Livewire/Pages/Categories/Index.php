<?php

namespace App\Livewire\Pages\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;

    // define layout
    #[Layout('layouts.app')]

    // define proprty
    #[Url]
    public $search;
    public $path = 'public/categories/';

    // define function delete
    public function delete($id)
    {
        // get category data by id
        $category = Category::findOrFail($id);

        // delete category image
        Storage::disk('local')->delete($this->path.basename($category->image));

        // delete category data
        $category->delete();
    }

    public function render()
    {
        // table heads
        $table_heads = ['No', 'Name', 'Image', 'Action'];

        // list categories data
        $categories = Category::query()
            ->when($this->search, fn($query) => $query->where('name', 'like', '%' .$this->search. '%'))
            ->latest()
            ->paginate(7);

        // render view
        return view('livewire.pages.categories.index', compact('categories', 'table_heads'));
    }
}
