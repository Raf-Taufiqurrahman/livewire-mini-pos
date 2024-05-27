@props(['title' => '', 'subtitle' => '', 'data' => ''])

<div {{ $attributes->merge(['class' => 'bg-white p-4 rounded-lg shadow']) }}>
    <div class='flex justify-between items-center gap-4'>
        <div class='flex items-center gap-3'>
            {{ $slot }}
            <div class='flex flex-col'>
                <div class='font-semibold text-sm line-clamp-1'>{{ $title }}</div>
                <div class='text-xs text-gray-500'>{{ $subtitle }}</div>
            </div>
        </div>
        <div class='font-semibold text-sm font-mono p-2 min-w-fit'>
            {{ $data }}
        </div>
    </div>
</div>
