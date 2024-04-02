@extends("layouts.app")
@section("style")
    <link href="/assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="/assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
@endsection
@section("wrapper")

    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('tutor.index'),'label'=>'ППС и сотрудники'],['label'=>'Добавить сотрудника']]"></x-breadcrumbs>
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
                                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                                    <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <ol>
                                                            <div class="text-white"> <sapn>* </sapn>{{ $error }}</div>
                                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                        </ol>
                                                    @endforeach
                                                    </ul>
                                                </div>
                                @endif

                                <ul class="nav nav-tabs nav-justified" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-personal" data-bs-toggle="tab" href="#tabpanel-personal" role="tab" aria-controls="tabpanel-personal" aria-selected="true"> Личные данные</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-doc" data-bs-toggle="tab" href="#tabpanel-doc" role="tab" aria-controls="tabpanel-doc" aria-selected="false"> Кадровый информация </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-contact" data-bs-toggle="tab" href="#tabpanel-contact" role="tab" aria-controls="tabpanel-contact" aria-selected="false"> Контактная информация </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-edu" data-bs-toggle="tab" href="#tabpanel-edu" role="tab" aria-controls="tabpanel-edu" aria-selected="false"> Сведения об образовании </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-kadr" data-bs-toggle="tab" href="#tabpanel-kard" role="tab" aria-controls="tabpanel-kard" aria-selected="false"> Кадровая информация </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-other" data-bs-toggle="tab" href="#tabpanel-other" role="tab" aria-controls="tabpanel-other" aria-selected="false"> Прочее </a>
                                    </li>
                                </ul>
                                <form action="{{ route('tutor.store') }}" method="POST" autocomplete="off">
                                    @csrf
                                    @method('post')
                                <div class="tab-content pt-5" id="tab-content">
                                    <div class="tab-pane active" id="tabpanel-personal" role="tabpanel" aria-labelledby="tab-personal">
                                            <div class="row mb-3">
                                                <label for="inputFirstname" class="col-sm-3 col-form-label">Фамилия</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputFirstname" name="firstname" value="{{ old('firstname') }}" placeholder="Фамилия">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputLastname" class="col-sm-3 col-form-label">Имя</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputLastname" name="lastname" value="{{ old('lastname') }}" placeholder="Имя">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputPatronymic" class="col-sm-3 col-form-label">Отчество</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputPatronymic" name="patronymic" value="{{ old('patronymic') }}" placeholder="Отчество">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputLastnamePrevious" class="col-sm-3 col-form-label">Прежняя фамилия</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputLastnamePrevious" name="lastnamePrevious" value="{{ old('lastnamePrevious') }}" placeholder="Прежняя фамилия">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputIIN" class="col-sm-3 col-form-label">ИИН</label>
                                                <div class="col-sm-9">
                                                    <input type="text" inputmode="numeric" pattern="[0-9]*" class="form-control" id="inputIIN" name="iinplt" value="{{ old('iinplt') }}" placeholder="ИИН">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="birthDate" class="col-sm-3 col-form-label form-label">Дата рождения</label>
                                                <div class="col-sm-9">
                                                    <input id="birthDate" type="date" name="BirthDate" value="{{ old('BirthDate') }}" class="form-control datepicker" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputNation" class="col-sm-3 col-form-label">Национальность</label>
                                                <div class="col-sm-9">
                                                    <select id="inputNation" class="form-select" name="NationID" data-placeholder="Национальность">
                                                        <option value="">Выбирать</option>
                                                        @foreach($nationalities as $n)
                                                            <option value={{ $n->Id }} {{ old('NationID') == $n->Id ? 'selected' : '' }}> {{ $n->NameKZ }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputType" class="col-sm-3 col-form-label">Гражданство</label>
                                                <div class="col-sm-9">
                                                    <select id="inputType" class="form-select" name="citizenshipID" data-placeholder="Тип">
                                                        <option value="">Выбирать</option>
                                                        @foreach($countries as $c)
                                                            <option value={{ $c->id }} {{ old('citizenshipID') == $c->id ? 'selected' : '' }}> {{ $c->namekz }} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputSex" class="col-sm-3 col-form-label">Пол</label>
                                                <div class="col-sm-9">
                                                    <select id="inputSex" class="form-select" name="SexID">
                                                        <option value="">Выбирать</option>
                                                        <option value=1 {{ old('SexID') == 1 ? 'selected' : '' }}> Женский  </option>
                                                        <option value=2 {{ old('SexID') == 2 ? 'selected' : '' }}> Мужской </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputIsmarried" class="col-sm-3 col-form-label">Семейное положение</label>
                                                <div class="col-sm-9">
                                                    <select id="inputIsmarried" class="form-select" name="ismarried" data-placeholder="Семейное положение">
                                                        <option value="">Выбирать</option>
                                                        <option value=1 {{ old('ismarried') == 1 ? 'selected' : '' }}> Женат/Замужем </option>
                                                        <option value=2 {{ old('ismarried') == 2 ? 'selected' : '' }}> Холост/Не замужем </option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputAddress" class="col-sm-3 col-form-label">Адрес прописки</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputAddress" name="adress" value="{{ old('adress') }}" placeholder="Адрес прописки">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="inputLivingAddress" class="col-sm-3 col-form-label">Адрес проживания</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="inputLivingAddress" name="living_adress" value="{{ old('living_adress') }}" placeholder="Адрес проживания">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="percoid" class="col-sm-3 col-form-label">Код карточки</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="percoid" name="percoid" value="{{ old('percoid') }}" placeholder="Код карточки">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="has_access" class="col-sm-3 form-check-label">Доступ к системе</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="form-check-input" id="has_access"  {{ old('has_access')?'checked':'' }} name="has_access">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="deleted" class="col-sm-3 form-check-label">Уволен</label>
                                                <div class="col-sm-9">
                                                    <input type="checkbox" class="form-check-input" id="deleted" {{ old('deleted')?'checked':'' }} name="deleted">
                                                </div>
                                            </div>
                                        <div class="row mb-3">
                                            <label for="inputRoles" class="col-sm-3 col-form-label">Роль в системе</label>
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
                                                    <button type="submit" class="btn btn-info px-5 text-white">Добавить</button>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="tab-pane" id="tabpanel-doc" role="tabpanel" aria-labelledby="tab-doc">
                                        <div class="row mb-3">
                                            <label for="inputDocType" class="col-sm-3 col-form-label">Документ, удостоверяющий личность</label>
                                            <div class="col-sm-9">
                                                <select id="inputDocType" class="form-select" name="ictype">
                                                    <option value="">Выбирать</option>
                                                    <option value=1 {{ old('ictype') == 1 ? 'selected' : '' }}>удостоверение личности</option>
                                                    <option value=2 {{ old('ictype') == 2 ? 'selected' : '' }}>паспорт</option>
                                                    <option value=3 {{ old('ictype') == 3 ? 'selected' : '' }}>свидетельство о рождении</option>
                                                    <option value=4 {{ old('ictype') == 4 ? 'selected' : '' }}>вид на жительство</option>
                                                    <option value=5 {{ old('ictype') == 5 ? 'selected' : '' }}>другой документ</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="icnumber" class="col-sm-3 col-form-label">Номер документа, удостоверяющего личность</label>
                                            <div class="col-sm-9">
                                                <input type="text" inputmode="numeric" class="form-control" id="icnumber" name="icnumber" value="{{ old('icnumber') }}" placeholder="Номер документа, удостоверяющего личность">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="icseries" class="col-sm-3 col-form-label">Серия документа, удостоверяющего личность</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="icseries" name="icseries" value="{{ old('icseries') }}" placeholder="Серия документа, удостоверяющего личность">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="icdate" class="col-sm-3 col-form-label form-label">Дата выдачи документа, удостоверяющего личность</label>
                                            <div class="col-sm-9">
                                                <input id="icdate" type="date" name="icdate" value="{{ old('icdate') }}" class="form-control datepicker" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="icdepartment" class="col-sm-3 col-form-label">Орган, выдавший документ, удостоверяющий личность</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="icdepartment" name="icdepartment" value="{{ old('icdepartment') }}" placeholder="Орган, выдавший документ, удостоверяющий личность">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabpanel-contact" role="tabpanel" aria-labelledby="tab-contact">
                                        <div class="row mb-3">
                                            <label for="phone" class="col-sm-3 col-form-label">Домашний телефон</label>
                                            <div class="col-sm-9">
                                                <input type="text" inputmode="numeric" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Домашний телефон">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="mobilePhone" class="col-sm-3 col-form-label">Мобильный телефон</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="mobilePhone" name="mobilePhone" value="{{ old('mobilePhone') }}" placeholder="Мобильный телефон">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="mail" class="col-sm-3 col-form-label">Почта</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="mail" name="mail" value="{{ old('mail') }}" placeholder="Почта">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabpanel-edu" role="tabpanel" aria-labelledby="tab-edu">
                                        <div class="row mb-3">
                                            <label for="edubase" class="col-sm-3 col-form-label">Базовое образование</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="edubase" name="edubase" rows="3" placeholder="Базовое образование"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="rang" class="col-sm-3 col-form-label">Достижения</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" id="rang" name="rang" rows="3" placeholder="Достижения"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ScientificFieldID" class="col-sm-3 col-form-label">Отрасль науки</label>
                                            <div class="col-sm-9">
                                                <select id="ScientificFieldID" class="form-select" name="ScientificFieldID">
                                                    <option value="">Выбирать</option>
                                                    @foreach($scienceFields as $sf)
                                                        <option value={{ $sf->Id }} {{ old('ScientificFieldID') == $sf->Id ? 'selected' : '' }}> {{ $sf->NameRU }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ScientificDegreeID" class="col-sm-3 col-form-label">Академическая степень</label>
                                            <div class="col-sm-9">
                                                <select id="ScientificDegreeID" class="form-select" name="ScientificDegreeID">
                                                    <option value="">Выбирать</option>
                                                    @foreach($scientificDegree as $sd)
                                                        <option value={{ $sd->ID }} {{ old('ScientificDegreeID') == $sd->ID ? 'selected' : '' }}> {{ $sd->NAMERU }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="AcademicStatusID" class="col-sm-3 col-form-label">Академический статус</label>
                                            <div class="col-sm-9">
                                                <select id="AcademicStatusID" class="form-select" name="AcademicStatusID">
                                                    <option value="">Выбирать</option>
                                                    @foreach($academicStatus as $as)
                                                        <option value={{ $as->id }} {{ old('AcademicStatusID') == $as->id ? 'selected' : '' }}> {{ $as->nameru }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabpanel-kard" role="tabpanel" aria-labelledby="tab-kadr">

                                        <div class="row mb-3">
                                            <label for="StartDate" class="col-sm-3 col-form-label form-label">Дата начала работы (в ВУЗе)</label>
                                            <div class="col-sm-9">
                                                <input id="StartDate" type="date" name="StartDate" value="{{ old('StartDate') }}" class="form-control datepicker" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="work_start_date" class="col-sm-3 col-form-label form-label">Дата начала рабочего стажа</label>
                                            <div class="col-sm-9">
                                                <input id="work_start_date" type="date" name="work_start_date" value="{{ old('work_start_date') }}" class="form-control datepicker" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="teaching_experience_start_date" class="col-sm-3 col-form-label form-label">Дата начала НПС</label>
                                            <div class="col-sm-9">
                                                <input id="teaching_experience_start_date" type="date" name="teaching_experience_start_date" value="{{ old('teaching_experience_start_date') }}" class="form-control datepicker" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="maternity_leave" class="col-sm-3 form-check-label">В декретном отпуске</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" class="form-check-input" id="maternity_leave" {{ old('maternity_leave')?'deleted':'' }} name="maternity_leave">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="on_foreign_trip" class="col-sm-3 form-check-label">В зарубежной командировке</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" class="form-check-input" id="on_foreign_trip" {{ old('on_foreign_trip')?'deleted':'' }} name="on_foreign_trip">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="ftutor" class="col-sm-3 form-check-label">Иностранный преподаватель</label>
                                            <div class="col-sm-9">
                                                <input type="checkbox" class="form-check-input" id="ftutor" {{ old('ftutor')?'deleted':'' }} name="ftutor">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="timetable_description" class="col-sm-3 col-form-label">Звание в краткой форме (для отображения в расписании)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="timetable_description" name="timetable_description" value="{{ old('timetable_description') }}" placeholder="Звание в краткой форме (для отображения в расписании)">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tabpanel-other" role="tabpanel" aria-labelledby="tab-other">

                                        <div class="row mb-3">
                                            <label for="additionalInformation" class="col-sm-3 col-form-label">Дополнительная информация</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="additionalInformation" name="additionalInformation" value="{{ old('additionalInformation') }}" placeholder="Дополнительная информация">
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="dljnEDO" class="col-sm-3 col-form-label">Занимаемая должность</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="dljnEDO" name="dljnEDO" value="{{ old('dljnEDO') }}" placeholder="Занимаемая должность">
                                            </div>
                                        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#mobilePhone').inputmask('+7(999)-999-9999');
        });
    </script>
    <script>
        $('.select-roles').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>

@endsection
