<?php

namespace App\Livewire\Pages\Categories;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    // define layout
    #[Layout('layouts.app')]

    // define property
    public Category $category;
    public $path = 'public/categories/';
    public $name;
    public $image;

    // define lifecycle hooks
    public function mount()
    {
        // assign proprty name with category name
        $this->name = $this->category->name;
    }

    // define valdiation
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:255|unique:categories,name,'.$this->category->id,
            'image' => 'nullable|image|max:2048',
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

            // update category image
            $this->category->update([
                'image' => $this->image->hashName(),
            ]);
        }

        // update category data
        $this->category->update([
            'name' => $this->name,
            'slug' => str()->slug($this->name),
        ]);

        // render view
        return $this->redirect('/categories', navigate:true);
    }

    public function render()
    {
        // render view
        return view('livewire.pages.categories.edit');
    }
}
