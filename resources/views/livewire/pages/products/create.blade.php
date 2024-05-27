<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card title="Create New Product">
                <form wire:submit.prevent="save">
                    <div class="mb-4">
                        <x-input type="text" label="Product Name" name="name" :value="old('name')" placeholder="Enter a product name..."/>
                    </div>
                    <div class="mb-4">
                        <x-input label="Product Image" type="file" name="image"/>
                    </div>
                    <div class="flex flex-col md:flex-row items-center gap-2 mb-4">
                        <div class="w-full md:w-1/2">
                            <x-select label="Product Category" name="categoryId">
                                    <option>Choose Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="w-full md:w-1/2">
                            <div class="flex flex-col md:flex-row items-center gap-2">
                                <div class="w-full md:w-1/2">
                                    <x-input type="number" label="Product Price" name="price" :value="old('price')" placeholder="Enter a product price..."/>
                                </div>
                                <div class="w-full md:w-1/2">
                                    <x-input type="number" label="Product Qty" name="qty" :value="old('qty')" placeholder="Enter a product qty..."/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-button type="submit" title="Create Product"/>
                        <x-button type="cancel" title="Go Back" :href="route('products.index')"/>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</div>
