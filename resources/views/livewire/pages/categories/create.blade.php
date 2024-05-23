<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card title="Create New Category">
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <x-input type="text" label="Category Name" name="name" :value="old('name')" placeholder="Enter a category name..."/>
                    </div>
                    <div class="mb-4">
                        <x-input label="Category Image" type="file" name="image"/>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button type="submit" title="Create Category"/>
                        <x-button type="cancel" title="Go Back" :href="route('categories.index')"/>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</div>
