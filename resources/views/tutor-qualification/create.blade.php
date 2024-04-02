@extends("layouts.app")

@section("wrapper")

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumbs class="mt-2"
                           :links="[['url'=>route('tutor.index'),'label'=>'ППС и сотрудники'],
                                    ['url'=>route('tutor-qualification.index',['tutor_id'=>$tutor_id]),'label'=>'Повышение квалификации'],
                                    ['label'=>'Добавить повышение квалификации']
                                    ]"></x-breadcrumbs>
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
                                    <h5 class="mb-0 text-info">Заполните форму</h5>
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

                                <form action="{{ route('tutor-qualification.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    @method('post')

                                    <div class="row mb-3">
                                        <label for="inputForm" class="col-sm-3 col-form-label">Форма повышения квалификации</label>
                                        <div class="col-sm-9">
                                            <select id="inputForm" class="form-select" name="form">
                                                <option value="">Выбирать</option>
                                                @foreach($formLabels as $label)
                                                    <option value="{{$label->ID}}" {{ old('form') == $label->ID ? 'selected' : '' }}>{{$label->NameRU}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputName" class="col-sm-3 col-form-label">Наименование организации</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputName" name="place" value="{{ old('place') }}" placeholder="Наименование организации">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputСountry" class="col-sm-3 col-form-label">Страна</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputСountry" name="country" value="{{ old('country') }}" placeholder="Страна">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputCity" class="col-sm-3 col-form-label">Город</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputCity" name="city" value="{{ old('city') }}" placeholder="Город">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputStart" class="col-sm-3 col-form-label form-label">Начало</label>
                                        <div class="col-sm-9">
                                            <input id="inputStart" type="date" name="start" value="{{ old('start') }}" class="form-control datepicker" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputFinish" class="col-sm-3 col-form-label form-label">Окончание</label>
                                        <div class="col-sm-9">
                                            <input id="inputFinish" type="date" name="finish" value="{{ old('finish') }}" class="form-control datepicker" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputLength" class="col-sm-3 col-form-label">Продолжительность и объем(час)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputLength" name="length" value="{{ old('length') }}" placeholder="1">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTematika" class="col-sm-3 col-form-label">Тематика</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputTematika" name="tematika" value="{{ old('tematika') }}" placeholder="Тематика">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPaymentformid" class="col-sm-3 col-form-label">Источник финансирования</label>
                                        <div class="col-sm-9">
                                            <select id="inputPaymentformid" class="form-select" name="paymentformid">
                                                <option value="">Выбирать</option>
                                                @foreach($financing as $key=>$value)
                                                    <option value="{{$key}}" {{ old('paymentformid') == $key ? 'selected' : '' }}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPaymentSum" class="col-sm-3 col-form-label">Сумма (тысяч тенге)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputPaymentSum" inputmode="numeric" name="paymentSum" value="{{ old('paymentSum') }}" placeholder="Сумма (тысяч тенге)">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputDocType" class="col-sm-3 col-form-label">Вид подтверждающего документа</label>
                                        <div class="col-sm-9">
                                            <select id="inputDocType" class="form-select" name="docType">
                                                <option value="">Выбирать</option>
                                                @foreach($docTypes as $key=>$value)
                                                    <option value="{{$key}}" {{ old('docType') == $key ? 'selected' : '' }}>{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputProfessionType" class="col-sm-3 col-form-label">Группа специальности</label>
                                        <div class="col-sm-9">
                                            <select id="inputProfessionType" class="form-select" name="professionType">
                                                <option value="">Выбирать</option>
                                                @foreach($professiontypes as $type)
                                                    <option value="{{$type->id}}" {{ old('professionType') == $type->id ? 'selected' : '' }}>{{$type->nameru}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputProfessionType" class="col-sm-3 col-form-label">Место прохождения повышения квалификации на базе</label>
                                        <div class="col-sm-9">
                                            <select id="inputProfessionType" class="form-select" name="placeOfFutherEducation">
                                                <option value="">Выбирать</option>
                                                @foreach($placeEducation as $place)
                                                    <option value="{{$place->id}}" {{ old('placeOfFutherEducation') == $place->id ? 'selected' : '' }}>{{$place->nameru}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                            <input type="hidden" class="form-control" id="inputPaymentSum" name="TutorID" value="{{ $tutor_id }}">
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

