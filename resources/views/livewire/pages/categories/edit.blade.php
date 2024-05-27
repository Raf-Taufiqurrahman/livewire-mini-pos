<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card title="Edit Category">
                <form wire:submit.prevent="update">
                    <div class="mb-4">
                        <x-input type="text" label="Category Name" name="name" :value="old('name')" placeholder="Enter a category name..."/>
                    </div>
                    <div class="mb-4">
                        <x-input label="Category Image" type="file" name="image"/>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button type="submit" title="Update Category"/>
                        <x-button type="cancel" title="Go Back" :href="route('categories.index')"/>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</div>
