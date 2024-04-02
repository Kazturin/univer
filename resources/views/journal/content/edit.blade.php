@extends("layouts.app")

@section("wrapper")


    <x-breadcrumbs class="mt-2"
                   :links="[['url'=>route('content.index'),'label'=>'Учебный контент дисциплины'],['label'=>'Изменить учебный контент']]"></x-breadcrumbs>

    <div class="bg-white border border-4 rounded-lg shadow relative my-6">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
            <h3 class="text-xl font-semibold">
                Редактировать учебный контент - {{ $content->contentname }}
            </h3>
            <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-toggle="product-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 space-y-6">
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="bg-red-500 text-white my-2 p-2 rounded">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form id="form" action="{{ route('content.update',$content->contentid) }}" method="POST" autocomplete="off">
                @csrf
                @method('put')
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-full">
                        <label for="inputParent" class="text-sm font-medium text-gray-900 block mb-2">Язык</label>
                        <select id="inputLang"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                name="lang">
                            <option value="">Выбирать</option>
                            <option value=2 {{ $content->lang == 2 ? 'selected' : '' }}> Казахский</option>
                            <option value=1 {{ $content->lang == 1 ? 'selected' : '' }}> Русский</option>
                            <option value=3 {{ $content->lang == 3 ? 'selected' : '' }}> Английский</option>
                        </select>
                    </div>
                    <div class="col-span-full">
                        <label for="inputName" class="text-sm font-medium text-gray-900 block mb-2">Наименование
                            учебного контента</label>
                        <input type="text"
                               id="inputName"
                               name="contentname"
                               value="{{ $content->contentname }}"
                               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                               required>
                    </div>
                </div>
            </form>
        </div>
        <div class="p-6 border-t border-gray-200 rounded-b">
            <button onclick="submitForm()"
                    class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                    type="submit">Сохранить
            </button>
        </div>
    </div>

@endsection

@push("scripts")
    <script>
        function submitForm() {
            document.getElementById('form').submit();
        }
    </script>
@endpush
