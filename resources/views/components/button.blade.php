@props(['type' => '', 'title' => '', 'href' => '', 'id' => ''])

@switch($type)
    @case('create')
        <a href="{{ $href }}" class="px-4 py-2 flex items-center gap-1 rounded-lg text-sm font-semibold bg-white border"
            wire:navigate>
            {{ $title }}
        </a>
    @break

    @case('edit')
        <a href="{{ $href }}"
            class="px-3 py-2 flex items-center gap-1 rounded-lg text-sm font-semibold text-indigo-500 bg-indigo-100 border-indigo-200 border hover:border-indigo-300 hover:bg-indigo-200">
            {{ $title }}
        </a>
    @break

    @case('delete')
        <div x-data="{openModalConfirm: false}">
            <button @click="openModalConfirm = true" type="button"
                class="px-3 py-2 flex items-center gap-1 rounded-lg text-sm font-semibold text-rose-500 bg-rose-100 border-rose-200 border hover:border-rose-300 hover:bg-rose-200">
                {{ $title }}
            </button>
            <x-modal :id="$id" type="delete"/>
        </div>
    @break

    @case('submit')
        <button type="submit"
            class="px-4 py-2 flex items-center gap-1 rounded-lg text-xs font-semibold bg-teal-500/20 border-teal-500/40 text-teal-500 border hover:bg-teal-600/40"
            {{ $attributes }}>
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icons-tabler-outline icon-tabler-pencil-plus">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
                <path d="M16 19h6" />
                <path d="M19 16v6" />
            </svg>
            {{ $title }}
        </button>
    @break

    @case('cancel')
        <a href="{{ $href }}"
            class="px-4 py-2 flex items-center gap-1 rounded-lg text-xs font-semibold bg-rose-500/20 border-rose-500/40 text-rose-500 border hover:bg-rose-600/40"
            wire:navigate>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left" width="18"
                height="18" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M5 12l14 0" />
                <path d="M5 12l4 4" />
                <path d="M5 12l4 -4" />
            </svg>
            {{ $title }}
        </a>
    @break

    @default
@endswitch
