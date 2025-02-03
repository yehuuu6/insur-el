<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation"
            class="select-none flex items-center justify-between gap-4">
            <span>
                @if ($paginator->onFirstPage())
                    <span
                        class="bg-white px-4 py-3 cursor-not-allowed rounded-md border border-gray-300 text-sm font-medium text-gray-500">
                        Önceki Sayfa
                    </span>
                @else
                    <button
                        class="bg-white px-4 py-2.5 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        wire:click="previousPage" wire:loading.attr="disabled" rel="prev">
                        Önceki Sayfa
                    </button>
                @endif
            </span>

            <span>
                @if ($paginator->onLastPage())
                    <span
                        class="bg-white px-4 py-3 cursor-not-allowed rounded-md border border-gray-300 text-sm font-medium text-gray-500">
                        Sonraki Sayfa
                    </span>
                @else
                    <button
                        class="bg-white px-4 py-2.5 rounded-md border border-gray-300 text-sm font-medium text-gray-700 hover:bg-gray-50"
                        wire:click="nextPage" wire:loading.attr="disabled" rel="next">
                        Sonraki Sayfa
                    </button>
                @endif
            </span>
        </nav>
    @endif
</div>
