@extends("layouts.app")

@section("wrapper")

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('navigation.index'),'label'=>'Роли'],['label'=>'Добавить роль']]"></x-breadcrumbs>
            <!--end breadcrumb-->

            <!--end row-->
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card border-top border-0 border-4 border-info">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="card-title d-flex align-items-center">
                                    <div><i class="bx bxs-food-menu me-1 font-22 text-info"></i>
                                    </div>
                                    <h5 class="mb-0 text-info">Роли</h5>
                                </div>
                                <hr/>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li class="bg-red-500 text-white my-2 p-2 rounded">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('role.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    @method('post')

                                    <div class="row mb-3">
                                        <label for="inputNameKz" class="col-sm-3 col-form-label">Наименова́ние(kz)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNameKz" name="name_kz" placeholder="Наименова́ние(kz)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNameRu" class="col-sm-3 col-form-label">Наименова́ние(ru)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNameRu" name="name_ru" placeholder="Наименова́ние(ru)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputSort" class="col-sm-3 col-form-label">Сортировка</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="inputSort" value="0" min="0" name="sort" placeholder="Сортировка">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputLink" class="col-sm-3 col-form-label">Ссылка</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputLink" name="url" placeholder="Ссылка">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputParent" class="col-sm-3 col-form-label">Родитель</label>
                                        <div class="col-sm-9">
                                            <select id="inputParent" class="select-parent-nav" name="parent_id">
                                                <option value="">Родительский меню</option>
                                                @foreach($navigations as $nav)
                                                    <option value="{{$nav->id}}">{{$nav->name_kz}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputRoles" class="col-sm-3 col-form-label">Роли</label>
                                        <div class="col-sm-9">
                                            <select id="inputRoles" class="select-roles" name="roles[]" data-placeholder="Choose anything" multiple="multiple">
                                                <option value="">Доступ</option>
                                                @foreach($roles as $role)
                                                    <option value="{{$role->RoleID}}">{{$role->RoleNameKZ}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <button type="submit" class="btn btn-info px-5">Добавить</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>

@endsection

