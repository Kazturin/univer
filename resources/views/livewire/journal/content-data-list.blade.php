<div class="w-full overflow-hidden rounded-lg shadow-lg border-t mb-5">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap shadow-lg">
            <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
            >
                <th class="px-4 py-3">Наименование</th>
                <th class="px-4 py-3">Неделя</th>
                <th class="px-4 py-3">Тип</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($contentData as $data)
                <tr class="text-gray-700 dark:text-gray-400" wire:key="{{ $data->cdetid }}">
                    <td class="px-4 py-3">{{ $data->name }}</td>
                    <td class="px-4 py-3"> {{ $data->w }} </td>
                    <td class="px-4 py-3">{{ $data->typeModel->name }}</td>
                    <td class="block px-4 py-3">
                        <div class="flex items-center justify-center text-purple-600 space-x-2">
                            <button wire:click="editContent({{ $data->cdetid }})" type="button">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                    ></path>
                                </svg>
                            </button>
                            <button wire:click="showContent({{ $data->cdetid }})" type="button" class="border-0">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path d="M15 12c0 1.654-1.346 3-3 3s-3-1.346-3-3 1.346-3 3-3 3 1.346 3 3zm9-.449s-4.252 8.449-11.985 8.449c-7.18 0-12.015-8.449-12.015-8.449s4.446-7.551 12.015-7.551c7.694 0 11.985 7.551 11.985 7.551zm-7 .449c0-2.757-2.243-5-5-5s-5 2.243-5 5 2.243 5 5 5 5-2.243 5-5z"/>
                                </svg>
                            </button>
                            <button type="button" wire:click="deleteContent({{ $data->cdetid }})" wire:confirm="Өшіруге сенімдісіз бе?" class="border-0">
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                        clip-rule="evenodd"
                                    ></path>
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
{{--    <div class="div">--}}
{{--        <!-- UPDATE CONTENT DATA MODAL -->--}}
{{--        <div class="modal fade" id="editContentModal" tabindex="-1" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-xl">--}}
{{--                @if($currentContent)--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title">Редактировать</h5>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <livewire:journal.content-data-update  :contentData="$currentContent" :key="$currentContent->cdetid" @saved="$dispatch('close-edit-modal')" />--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@push("script")
{{--    <script>--}}
{{--        // window.addEventListener('close-modal', event =>{--}}
{{--        //     $('#addPostModal').modal('hide');--}}
{{--        //     $('#editPostModal').modal('hide');--}}
{{--        //     $('#deletePostModal').modal('hide');--}}
{{--        // });--}}
{{--        Livewire.on('close-edit-modal', () => {--}}
{{--            $('#editContentModal').modal('hide');--}}
{{--        });--}}
{{--        Livewire.on('edit-content-modal', () => {--}}
{{--            $('#editContentModal').modal('show');--}}
{{--        });--}}
{{--    </script>--}}
{{--    @yield('script_update_content')--}}
@endpush
