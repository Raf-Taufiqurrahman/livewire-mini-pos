<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex items-center justify-between gap-4">
                <x-button type="create" :href="route('categories.create')">
                    <x-slot name="title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-circle-plus">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" />
                            <path d="M9 12h6" />
                            <path d="M12 9v6" />
                        </svg>
                        Create New Category
                    </x-slot>
                </x-button>
                <div class="w-1/2">
                    <x-search placeholder="Search categories by name.."/>
                </div>
            </div>
            <x-table :heads="$table_heads" title="List Data Categories">
                @forelse ($categories as $key => $category)
                    <tr>
                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                            {{ $key + $categories->firstItem() }}</td>
                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">{{ $category->name }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}"
                                class="object-cover w-10 h-10 rounded-lg" />
                        </td>
                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                            <div class="flex items-center gap-2">
                                <x-button type="edit" title="Edit" :href="route('categories.edit', $category->id)"/>
                                <x-button type="delete" title="Delete" id="delete({{ $category->id }})"/>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"
                            class="whitespace-nowrap px-6 py-2 text-rose-700 rounded-b-lg text-sm text-center">
                            Sorry, we couldn't find anything...
                        </td>
                    </tr>
                @endforelse
            </x-table>
        </div>
    </div>
</div>
