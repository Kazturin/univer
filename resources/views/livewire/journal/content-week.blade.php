<div class="p-2">
    <div>
            @if(session()->get('message'))
                <div class="font-regular relative block w-full rounded-lg bg-green-500 p-4 mb-4 text-base leading-5 text-white opacity-100"
                     data-dismissible="alert">
                    <div class="mr-12">{{ session()->get('message') }}</div>
                    <div class="absolute top-2.5 right-3 w-max rounded-lg transition-all hover:bg-white hover:bg-opacity-20"
                         data-dismissible-target="alert">
                        <button role="button" class="w-max rounded-lg p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>
                </div>
            @endif
    </div>
    <div class="mb-3">
        <label for="inputName"  class="text-sm leading-6">Заголовок недели</label>
        <div class="mt-2">
            <input wire:model="name"
                   id="inputName"
                   type="text"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                   placeholder="Заголовок недели">
            <div class="mt-2">
                @error('name') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="inputData" class="text-sm leading-6">Цели и задачи недели</label>
        <div class="mt-2">
            <textarea wire:model="data" id="inputData"
                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            <div class="mt-2">
                @error('data') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div>
        <div class="p-6 border-t border-gray-200 rounded-b">
            <button type="button" wire:click="save"  class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">
                <div wire:loading class="spinner-border spinner-border-sm text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Сохранить</button>
        </div>
    </div>
</div>
