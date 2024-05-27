<div class="py-12 px-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-4 items-start">
            <div class="w-full md:w-2/3">
                <div class="w-full">
                    <x-search placeholder="Search product by name..." />
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-items-center gap-4">
                        @forelse ($products as $product)
                            <button wire:click="addToCart({{ $product->id }})"
                                class="bg-white border rounded-lg relative">
                                <img src="{{ $product->image }}" alt="{{ $product->title }}"
                                    class="rounded-lg rounded-b-none" />
                                <div
                                    class="top-0 absolute left-0 font-mono bg-rose-300/40 w-10 rounded-r-2xl text-rose-500 rounded-tl-lg border-rose-500 border">
                                    {{ $product->qty }}
                                </div>
                                <div class="p-4">
                                    <div class="font-semibold">
                                        {{ $product->name }}
                                    </div>
                                    <p class="text-sm text-gray-500 mb-2">{{ $product->category->name }}</p>
                                    <div class="font-mono">
                                        <sup>Rp</sup> {{ number_format($product->price, 0) }}
                                    </div>
                                </div>
                            </button>
                        @empty
                            <div class="col-span-3 text-rose-500">
                                Opps, sorry we couldn't find anything...
                            </div>
                        @endforelse
                    </div>
                    <div class="mt-4">
                        {{ $products->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3">
                <div class="py-3 px-4 bg-white rounded-t-lg border">
                    <div class='flex items-center gap-2 uppercase font-semibold text-sm'>
                        SHOPPING CART
                    </div>
                </div>
                @if(count($carts) > 0)
                <div class="bg-white border border-t-0 border-b rounded-b-lg">
                    <div class="flex flex-col gap-2">
                        @foreach ($carts as $key => $cart)
                            <div>
                                <div class="flex flex-row items-center gap-4 w-full px-4 py-3">
                                    <button wire:click="removeItem({{ $cart->id }})" class="rounded-lg p-2 border border-rose-500 hover:bg-rose-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash text-rose-500">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 7l16 0" />
                                            <path d="M10 11l0 6" />
                                            <path d="M14 11l0 6" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>
                                    </button>
                                    <div class="flex flex-col w-full gap-2">
                                        <div class="font-semibold">{{ $cart->product->name }}</div>
                                        <div class="flex md:flex-col items-center md:items-start lg:flex-row lg:items-center justify-between gap-2">
                                            <div class="font-mono text-sm text-gray-500">
                                                <sup>Rp</sup> {{ number_format($cart->price, 0) }}
                                            </div>
                                            <div class="flex items-center">
                                                <button wire:click="decrementQty({{ $cart->id }})"
                                                    class=" bg-white hover:bg-gray-100 flex h-4 items-center justify-center rounded-l-md border p-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0"
                                                    aria-label="subtract">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        aria-hidden="true" stroke="currentColor" fill="none"
                                                        stroke-width="1.5" class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />
                                                    </svg>
                                                </button>
                                                <input wire:model="totalQty.{{ $cart->id }}" type="text"
                                                    class="h-4 w-10 rounded-none text-xs font-mono text-center text-black border-t border-b border-r-0 border-l-0 border-gray-200 focus:ring-0 focus:border-gray-200"
                                                    readonly />
                                                <button wire:click="incrementQty({{ $cart->id }})"
                                                    class="bg-white hover:bg-gray-100 flex h-4 items-center justify-center rounded-r-md border p-2 text-slate-700 hover:opacity-75 focus-visible:z-10 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-700 active:opacity-100 active:outline-offset-0"
                                                    aria-label="add">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        aria-hidden="true" stroke="currentColor" fill="none"
                                                        stroke-width="1.5" class="size-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-t mt-4 py-2 {{ $loop->last ? '' : 'border-b border-dashed' }}">
                                    <div class="px-4">
                                        <div class="flex justify-between items-center">
                                            <div class="text-gray-600 text-sm font-semibold">
                                                Subtotal Item's
                                            </div>
                                            <div class="font-mono text-sm">
                                                <sup>Rp</sup>{{ number_format($subTotalPrice[$cart->id], 0) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-4">
                    <div x-data="{showModal : false}">
                        <button @click="showModal = true" class="text-sm text-center w-full px-3 py-1.5 border bg-gray-900 rounded-md focus:outline-none focus:ring-0 text-gray-50" type="button">Detail Transaction</button>
                        <x-modal type="transaction">
                            <div class="p-4">
                                <form wire:submit.prevent="save">
                                    <div class="flex items-center justify-between gap-2 border-b px-4 py-3 border-dashed border-gray-700">
                                        <div class="font-semibold text-sm">
                                            Grand Total
                                        </div>
                                        <div class="font-mono text-sm">
                                             <sup>Rp</sup>{{ number_format($totalPrice, 0) }}
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between gap-2 border-b px-4 py-3 border-dashed border-gray-700">
                                        <div class="font-semibold text-sm">
                                            Pay
                                        </div>
                                        <div class="flex items-center justify-end">
                                            <input type="number" min="0" wire:model.live="pay" class="w-2/3 h-1/2 border-0 border-b border-slate-700 bg-slate-800 text-sm text-end font-mono focus:ring-0 focus:border-b-gray-700"/>
                                       </div>
                                    </div>
                                    <div class="flex items-center justify-between gap-2 px-4 py-3 border-b  border-dashed border-gray-700">
                                        <div class="font-semibold text-sm">
                                            Change
                                        </div>
                                        <div class="font-mono text-sm">
                                             <sup>Rp</sup>{{ number_format($change, 0) }}
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button
                                            type="submit"
                                            class="{{ $pay >= $totalPrice ? 'bg-gray-900 text-gray-50' : 'cursor-not-allowed bg-slate-900 text-gray-500' }} text-sm text-center w-full px-3 py-1.5 border rounded-md focus:outline-none focus:ring-0 border-gray-700"
                                            {{ $pay >= $totalPrice ? '' : 'disabled' }}>
                                            {{ $pay >= $totalPrice ? 'Save Transaction' : 'Please complete the payment first' }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </x-modal>
                    </div>
                </div>
                @else
                    <div class="bg-white border border-t-0 rounded-b-lg text-center px-4 py-3 text-rose-500">
                        You don't have any item's
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
