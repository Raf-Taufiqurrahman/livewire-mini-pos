@props(['label' => '', 'name' => ''])

<div class='flex flex-col gap-2'>
    <label class='text-gray-600 text-sm'>{{ $label }}</label>
    <select class="w-full px-3 py-1.5 border bg-white text-sm rounded-md focus:outline-none focus:ring-0 text-gray-700 focus:border-sky-500 border-gray-200 @error($name) border-rose-500 @enderror" wire:model="{{ $name }}" {{ $attributes }}>
        {{ $slot }}
    </select>
    @error($name)
        <small class='text-xs text-red-500'>{{ $message }}</small>
    @enderror
</div>
