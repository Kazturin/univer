@extends("layouts.app")

@section("wrapper")
    <div>
        <div>
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('job-title.index'),'label'=>'Должности'],['label'=>'Редактировать должность']]"></x-breadcrumbs>
            <div class="bg-white border border-4 rounded-lg shadow relative my-10">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Редактировать должность
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
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
                    <form id="form" action="{{ route('job-title.update', $jobTitle->ID) }}" method="POST" autocomplete="off">
                        @csrf
                        @method('put')
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-full">
                                <label for="inputType" class="text-sm font-medium text-gray-900 block mb-2">Категория</label>
                                <select id="inputType"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        name="roleType">
                                    <option value="">Выбирать</option>
                                    <option value=1 {{ $jobTitle->roleType == 1 ? 'selected' : '' }}> Преподователь </option>
                                    <option value=2 {{  $jobTitle->roleType == 2 ? 'selected' : '' }}> Сотрудник </option>
                                    <option value=-1 {{  $jobTitle->roleType == -1 ? 'selected' : '' }}> Другое </option>
                                </select>
                            </div>
                            <div class="col-span-full">
                                <label for="inputNameKZ" class="text-sm font-medium text-gray-900 block mb-2">Наименова́ние(kz)</label>
                                <input type="text"
                                       id="inputNameKZ"
                                       name="NameKZ"
                                       value="{{ $jobTitle->NameKZ }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       required>
                            </div>
                            <div class="col-span-full">
                                <label for="inputNameRu" class="text-sm font-medium text-gray-900 block mb-2">Наименова́ние(ru)</label>
                                <input type="text"
                                       id="inputNameRu"
                                       name="NameRU"
                                       value="{{ $jobTitle->NameRU }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       required>
                            </div>
                            <div class="col-span-full">
                                <label for="inputNameEn" class="text-sm font-medium text-gray-900 block mb-2">Наименова́ние(en)</label>
                                <input type="text"
                                       id="inputNameEn"
                                       name="NameEN"
                                       value="{{ $jobTitle->NameEN }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       required>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="p-6 border-t border-gray-200 rounded-b">
                    <button onclick="submitForm()" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Изменить</button>
                </div>

            </div>
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
