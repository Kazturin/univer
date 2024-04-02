<div class="p-4 w-full">
    <div class="flex items-start justify-between py-2 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            {{ $currentContent['name'] }}
        </h3>
        <button wire:click="$dispatch('closeModal', { component: 'content-data-create' })" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
        @if($currentContent)
            <div>
                {!! $currentContent['data'] !!}
            </div>
        @endif
    <div class="px-4 py-3 text-right sm:px-6">
        <button  wire:click="$dispatch('closeModal', { component: 'content-data-create' })" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Закрыть
        </button>
    </div>
</div>
