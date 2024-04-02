@extends("layouts.app")
@section("style")
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
@endsection
@section("wrapper")
    <div>
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('navigation.index'),'label'=>'Навигация'],['label'=>'Добавить навигацию']]"></x-breadcrumbs>
            <div class="bg-white border border-4 rounded-lg shadow relative my-10">

                <div class="flex items-start justify-between p-5 border-b rounded-t">
                    <h3 class="text-xl font-semibold">
                        Меню енгізу
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
                    <form id="form" action="{{ route('navigation.store') }}" method="POST" autocomplete="off">
                        @csrf
                        @method('post')
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="inputNameKz" class="text-sm font-medium text-gray-900 block mb-2">Наименова́ние(kz)</label>
                                <input type="text"
                                       id="inputNameKz"
                                       name="name_kz"
                                       value="{{ old('name_kz') }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="inputNameRu" class="text-sm font-medium text-gray-900 block mb-2">Наименова́ние(ru)</label>
                                <input type="text"
                                       id="inputNameRu"
                                       name="name_ru"
                                       value="{{ old('name_ru') }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="inputSort" class="text-sm font-medium text-gray-900 block mb-2">Сортировка</label>
                                <input type="number"
                                       value="{{ old('sort') }}"
                                       min="0"
                                       name="sort"
                                       id="inputSort"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       >
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="inputLink" class="text-sm font-medium text-gray-900 block mb-2">Ссылка</label>
                                <input type="text"
                                       id="inputLink"
                                       name="url"
                                       value="{{ old('url') }}"
                                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                       placeholder="https://shakarim.edu.kz">
                            </div>
                            <div class="col-span-full">
                                <label for="inputParent" class="text-sm font-medium text-gray-900 block mb-2">Родительский меню</label>
                                <select id="inputParent" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="parent_id">
                                    <option value="">Нет</option>
                                    @foreach($navigations as $nav)
                                        <option value="{{$nav->id}}" {{ old('parent_id')==$nav->id ? 'selected' : '' }}>{{$nav->name_kz}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-span-full">
                                <label for="inputRoles" class="text-sm font-medium text-gray-900 block mb-2">Роли</label>
                                <select id="inputRoles"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                                        name="roles[]"
                                        data-placeholder="Кому доступно?"
                                        multiple="multiple">
                                    <option value="">Доступ</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->RoleID}}" {{ old('roles') && in_array($role->RoleID,old('roles')) ? 'selected' : ''  }}>{{$role->RoleNameKZ}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </form>

                </div>

                <div class="p-6 border-t border-gray-200 rounded-b">
                    <button onclick="submitForm()" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Добавить</button>
                </div>

            </div>
    </div>

@endsection

@push("scripts")
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/plugins/select2/js/select2.min.js"></script>
    <script>
        $('#inputRoles').select2({
            width: '100%'
        });
        $('#inputParent').select2();

        function submitForm() {
            document.getElementById('form').submit();
        }
    </script>
@endpush
