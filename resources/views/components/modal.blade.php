@props(['id' => '', 'title' => '', 'type'])

@switch($type)
    @case('delete')
        <div x-cloak x-show="openModalConfirm" x-transition.opacity.duration.200ms x-trap.inert.noscroll="openModalConfirm"
            @keydown.esc.window="openModalConfirm = false" @click.self="openModalConfirm = false"
            class="fixed inset-0 z-50 flex justify-center bg-black/20 p-4 pb-8 backdrop-blur-md items-center lg:p-8 "
            role="dialog" aria-modal="true" aria-labelledby="modalConfirm">
            <!-- Modal Dialog -->
            <div x-show="openModalConfirm"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex flex-col gap-4 rounded-xl border border-slate-700 bg-slate-800 text-slate-300 w-full max-w-lg">
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b px-4 py-2 border-slate-700 bg-slate-900/20">
                    <div class="flex items-center justify-center rounded-full bg-rose-600/20 text-rose-600 p-1 animate-pulse">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-6"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <button @click="openModalConfirm = false" aria-label="close modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                            fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Dialog Body -->
                <div class="px-4 text-center">
                    <h3 id="dangerModalTitle" class="mb-2 font-bold tracking-wide text-white text-lg">Confirmation</h3>
                    <p class="text-sm text-gray-500">Are you sure you want to delete this data?</p>
                </div>
                <!-- Dialog Footer -->
                <div class="flex items-center justify-center border-slate-300 p-4 dark:border-slate-700">
                    <button @click="openModalConfirm = false" type="button"
                        class="w-full cursor-pointer whitespace-nowrap rounded-xl bg-rose-600 px-4 py-2 text-center text-sm font-semibold tracking-wide text-white transition hover:opacity-75 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-rose-600 active:opacity-100 active:outline-offset-0"
                        wire:click="{{ $id }}">
                        Of Course, Delete it!
                    </button>
                </div>
            </div>
        </div>
    @break

    @case('transaction')
        <div x-cloak x-show="showModal" x-transition.opacity.duration.200ms x-trap.inert.noscroll="showModal"
            @keydown.esc.window="showModal = false" @click.self="showModal = false"
            class="fixed inset-0 z-50 flex justify-center bg-black/20 p-4 pb-8 backdrop-blur-md items-center lg:p-8 "
            role="dialog" aria-modal="true" aria-labelledby="modalConfirm">
            <!-- Modal Dialog -->
            <div x-show="showModal"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex flex-col gap-4 rounded-xl border border-slate-700 bg-slate-800 text-slate-300 w-full max-w-lg">
                <!-- Dialog Header -->
                <div class="flex items-center justify-between border-b px-4 py-2 border-slate-700 bg-slate-900/20">
                    <div>
                        Detail Transaction
                    </div>
                    <button @click="showModal = false" aria-label="close modal">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                            fill="none" stroke-width="1.4" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Dialog Body -->
                {{ $slot }}
            </div>
        </div>
    @break
@endswitch

