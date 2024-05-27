@props(['title' => ''])

<div class="py-3 px-4 bg-white rounded-t-lg border">
    <div class='flex items-center gap-2 uppercase font-semibold text-sm'>
        {{ $title }}
    </div>
</div>
<div class="px-4 py-3 bg-white border border-t-0 rounded-b-lg">
    {{ $slot }}
</div>
