@props(['placeholder' => ''])

<div class="relative flex w-full flex-col gap-1 text-gray-400">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" class="absolute left-2.5 top-1/2 size-5 -translate-y-1/2 text-gray-700/50">
        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    <input
        type="test"
        class="w-full rounded-lg border border-gray-200 text-gray-700 py-2 px-4 pl-10 pr-2 text-sm focus:outline-none disabled:cursor-not-allowed disabled:opacity-750"
        wire:model.live="search"
        placeholder="{{ $placeholder }}"
        aria-label="search"
    />
</div>


