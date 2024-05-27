<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 items-center">
            <x-widget title="Revenue" subtitle="Total amount of revenue" :data="'IDR ' . number_format($revenue, 0)">
                <div class="p-2 rounded-lg bg-teal-100 text-teal-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-cash">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M7 9m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                        <path d="M14 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                        <path d="M17 9v-2a2 2 0 0 0 -2 -2h-10a2 2 0 0 0 -2 2v6a2 2 0 0 0 2 2h2" />
                    </svg>
                </div>
            </x-widget>
            <x-widget title="Monthly Revenue" subtitle="Total revenue this month" :data="'IDR ' . number_format($monthly_revenue, 0)">
                <div class="p-2 rounded-lg bg-sky-100 text-sky-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-dollar">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 21h-7a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                        <path d="M16 3v4" />
                        <path d="M8 3v4" />
                        <path d="M4 11h12.5" />
                        <path d="M21 15h-2.5a1.5 1.5 0 0 0 0 3h1a1.5 1.5 0 0 1 0 3h-2.5" />
                        <path d="M19 21v1m0 -8v1" />
                    </svg>
                </div>
            </x-widget>
            <x-widget title="Transaction" subtitle="Grand total of transactions" :data="$transaction">
                <div class="p-2 rounded-lg bg-indigo-100 text-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-invoice">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                        <path
                            d="M19 12v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-14a2 2 0 0 1 2 -2h7l5 5v4.25" />
                    </svg>
                </div>
            </x-widget>
            <x-widget title="Product" subtitle="Grand total of the products" :data="$transaction">
                <div class="p-2 rounded-lg bg-yellow-100 text-yellow-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-box">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                    </svg>
                </div>
            </x-widget>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start py-4">
            <div>
                <div class="p-4 bg-white rounded-t-lg border">
                    <div class='flex items-center gap-2 uppercase font-semibold text-sm'>
                        Top 10 Best Selling Products
                    </div>
                </div>
                <div class="bg-white rounded-b-lg border border-t-0">
                    <div class="w-full overflow-hidden overflow-x-auto border-collapse rounded-xl">
                        <table class="w-full text-sm border-collapse">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-left align-middle font-medium whitespace-nowrap">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="h-12 px-6 text-left align-middle font-medium whitespace-nowrap">
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="h-12 px-6 text-center align-middle font-medium whitespace-nowrap">
                                        Number of Sales
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse ($best_selling_products as $key => $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                                            {{ $key + 1 }}</td>
                                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                                            {{ $item->name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm text-center">
                                            {{ $item->total_sold }}
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <div class="p-4 bg-white rounded-t-lg border">
                    <div class='flex items-center gap-2 uppercase font-semibold text-sm'>
                        Product out of Stock
                    </div>
                </div>
                <div class="bg-white rounded-b-lg border border-t-0">
                    <div class="w-full overflow-hidden overflow-x-auto border-collapse rounded-xl">
                        <table class="w-full text-sm border-collapse">
                            <thead class="border-b">
                                <tr>
                                    <th scope="col"
                                        class="h-12 w-10 px-6 text-left align-middle font-medium whitespace-nowrap">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="h-12 px-6 text-left align-middle font-medium whitespace-nowrap">
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="h-12 px-6 text-left align-middle font-medium whitespace-nowrap">
                                        Product Category
                                    </th>
                                    <th scope="col"
                                        class="h-12 px-6 text-center align-middle font-medium whitespace-nowrap">
                                        Product Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse ($product_out_stocks as $key => $item)
                                    <tr>
                                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                                            {{ $key + 1 }}</td>
                                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                                            {{ $item->name }}
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm">
                                            {{ $item->category->name }}
                                        </td>
                                        <td
                                            class="whitespace-nowrap px-6 py-2 text-gray-700 rounded-b-lg text-sm text-center">
                                            {{ $item->qty }}
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
