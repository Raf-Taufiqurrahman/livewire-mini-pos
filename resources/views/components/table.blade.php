@props(['title' => '', 'heads' => [], 'href' => ''])

<div class="p-4 bg-white rounded-t-lg border">
    <div class='flex items-center gap-2 uppercase font-semibold text-sm'>
        {{ $title }}
    </div>
</div>
<div class="bg-white rounded-b-lg border border-t-0">
    <div class="w-full overflow-hidden overflow-x-auto border-collapse rounded-xl">
        <table class="w-full text-sm border-collapse">
            <thead class="border-b">
                <tr>
                    @foreach ($heads as $head)
                        <th scope="col" class="h-12 px-6 text-left align-middle font-medium whitespace-nowrap">
                            {{ $head }}
                        </th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y">
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>
