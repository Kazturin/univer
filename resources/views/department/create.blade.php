@extends("layouts.app")

@section("style")
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection

@section("wrapper")

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('department.index'),'label'=>'Структура ВУЗа'],['label'=>'Добавить подразделение']]"></x-breadcrumbs>
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
                                    <h5 class="mb-0 text-info">Меню</h5>
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

                                <form action="{{ route('department.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    @method('post')

                                    <div class="row mb-3">
                                        <label for="inputType" class="col-sm-3 col-form-label">Тип подразделения</label>
                                        <div class="col-sm-9">
                                            <select id="inputType" class="form-select" name="subdivision_type" data-placeholder="Тип">
                                                <option value="">Выбирать</option>
                                                    <option value=1 {{ old('subdivision_type') == 1 ? 'selected' : '' }}> Структура </option>
                                                    <option value=2 {{ old('subdivision_type') == 2 ? 'selected' : '' }}> Факультет </option>
                                                    <option value=3 {{ old('subdivision_type') == 3 ? 'selected' : '' }}> Кафедра </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputParent" class="col-sm-3 col-form-label">Входит в структорное подразделение</label>
                                        <div class="col-sm-9">
                                            <select id="inputParent" class="select-parent-nav" name="pre">
                                                <option value="">Выбирать</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}" {{ old('pre') == $department->id ? 'selected' : '' }}>{{$department->nameru}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNameKz" class="col-sm-3 col-form-label">Наименова́ние(kz)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNameKz" name="namekz" value="{{ old('namekz') }}" placeholder="Наименова́ние(kz)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNameRu" class="col-sm-3 col-form-label">Наименова́ние(ru)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNameRu" name="nameru" value="{{ old('nameru') }}" placeholder="Наименова́ние(ru)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputNameEN" class="col-sm-3 col-form-label">Наименова́ние(en)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputNameEN" name="nameen" value="{{ old('nameen') }}" placeholder="Наименова́ние(en)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDirector" class="col-sm-3 col-form-label">Руководитель подразделения</label>
                                        <div class="col-sm-9">
                                            <select id="inputDirector" class="select-director" name="dean" data-placeholder="Руководитель подразделения">
                                                <option value="">Выбирать</option>
                                                @foreach($employees as $employee)
                                                    <option value="{{$employee->TutorID}}" {{ old('dean') == $employee->TutorID ? 'selected' : '' }}>{{$employee->lastname.' '.$employee->firstname}}</option>
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

@section("script")
    <script src="/assets/plugins/select2/js/select2.min.js"></script>
    <script>
        $('.select-parent-nav').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.select-director').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
