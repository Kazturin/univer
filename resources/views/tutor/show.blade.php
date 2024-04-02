@extends("layouts.app")
@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <x-breadcrumbs class="mt-2"  :links="[['url'=>route('tutor.index'),'label'=>'ППС и сотрудники'],['label'=>$tutor->lastname.' '.$tutor->firstname.' '.$tutor->patronymic]]"></x-breadcrumbs>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <img src="https://ais.semgu.kz/dist/img/pps/{{$tutor->TutorID}}.jpg" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                        <div class="mt-3">
                                            <h4>{{$tutor->lastname.' '.$tutor->firstname.' '.$tutor->patronymic}}</h4>
                                            <p class="text-secondary mb-1">
                                                @foreach($tutor->roles as $role)
                                                    {{ $role->RoleNameKZ }}
                                                @endforeach
                                            </p>
                                            <a href="{{route('tutor.edit',$tutor->TutorID)}}">
                                                <button class="btn btn-primary">Редактировать</button>
                                            </a>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0"><i class="bx bxs-phone me-1 font-22 text-info"></i>Телефон</h6>
                                            <span class="text-secondary">{{ $tutor->mobilePhone }}</span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                            <h6 class="mb-0 d-flex align-items-center"><i class="bx bxs-envelope me-1 font-22 text-info"></i>Email</h6>
                                            <span class="text-secondary">{{ $tutor->email }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card p-4">
                                <div class="container card-body">
                                    <div class="row row-cols-1 row-cols-md-2">
                                        <div class="col">
                                            @if($tutor->cafedra)
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Факультет</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    {{ $tutor->cafedra->cafedraInfo->faculty->facultyNameRU }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Кафедра</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    {{ $tutor->cafedra->cafedraInfo->cafedraNameRU }}
                                                </div>
                                            </div>
                                            @endif
                                            @if($tutor->department)
                                              <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Департамент</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    {{ $tutor->department->nameru }}
                                                </div>
                                              </div>
                                            @endif
                                            <div class="row mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Образования</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    {{ $tutor->edubase }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Удостоверение личности</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    <div>
                                                        <span class="fst-italic">Номер: </span>{{ $tutor->icnumber }}
                                                    </div>
                                                    <div>
                                                        <span class="fst-italic">Серия: </span>{{ $tutor->icseries }}
                                                    </div>
                                                    <div>
                                                        <span class="fst-italic">Дата выдачи: </span> {{ $tutor->icdate }}
                                                    </div>
                                                    <div>
                                                        <span class="fst-italic">Орган, выдавший документ: </span>{{ $tutor->icdepartment }}
                                                    </div>
                                                </div>
                                            </div>
{{--                                            <div class="mb-3">--}}
{{--                                                <h6 class="mb-2 fw-bold">Ученая (академическая) степень, звание:</h6>--}}
{{--                                                <div class="col-sm-9 text-secondary">--}}
{{--                                                    <div>--}}
{{--                                                        <span class="fst-italic">Отрасль науки: </span>{{ $tutor->icnumber }}--}}
{{--                                                    </div>--}}
{{--                                                    <div>--}}
{{--                                                        <span class="fst-italic">Академическая степень: </span>{{ $tutor->icseries }}--}}
{{--                                                    </div>--}}
{{--                                                    <div>--}}
{{--                                                        <span class="fst-italic">Академический статус: </span> {{ $tutor->icdate }}--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">ИИН</h6>
                                                <div class="col-sm-9 text-secondary">
                                                    {{ $tutor->iinplt }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                               <h6 class="mb-2 fw-bold text-muted">День рождения</h6>
                                                <div class="text-secondary">
                                                    {{ $tutor->BirthDate }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Семейное положение</h6>
                                                <div class="text-secondary">
                                                    {{ $sex[$tutor->SexID] }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                               <h6 class="mb-2 fw-bold text-muted">Адрес прописки</h6>
                                                <div class="text-secondary">
                                                    {{ $tutor->adress }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <h6 class="mb-2 fw-bold text-muted">Адрес проживания</h6>
                                                <div class="text-secondary">
                                                    {{ $tutor->living_adress }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Қосымша ақпараттар</h5>
                                            <hr/>
                                            <div class="accordion mb-2" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingEducations">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEducations" aria-expanded="false" aria-controls="collapseEducations">
                                                            Сведения об образовании
                                                        </button>
                                                    </h2>
                                                    <div id="collapseEducations" class="accordion-collapse collapse" aria-labelledby="headingEducations" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                           @foreach($tutor->educations as $edu)
                                                                <ul class="list-unstyled">
                                                                    <li class="border-b">
                                                                        <div class="accordion" id="accordionEducation">
                                                                            <div class="accordion-item">
                                                                                <h2 class="accordion-header" id="heading{{$edu->id}}">
                                                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInstitution{{$edu->id}}" aria-expanded="false" aria-controls="collapseInstitution{{$edu->id}}">
                                                                                        {{ $edu->institutionName }}
                                                                                    </button>
                                                                                </h2>
                                                                                <div id="collapseInstitution{{$edu->id}}" class="accordion-collapse collapse" aria-labelledby="heading{{$edu->id}}" data-bs-parent="accordionEducation">
                                                                                    <ul class="accordion-body list-unstyled">
                                                                                        <li class="border-b pb-4">
                                                                                            <div class="font-semibold fw-bold text-muted">СВЕДЕНИЯ О ДОКУМЕНТЕ ОБ ОБРАЗОВАНИИ:</div>
                                                                                            <div>{{ $edu->documentInfo }}</div>
                                                                                        </li>
                                                                                        <li class="border-b pb-4">
                                                                                            <div class="font-semibold fw-bold text-muted">КВАЛИФИКАЦИЯ ПО ДОКУМЕНТУ ОБРАЗОВАНИЯ:</div>
                                                                                            <div>{{ $edu->qualificationInfoDocument }}</div>
                                                                                        </li>
                                                                                        <li class="border-b pb-4 fw-bold text-muted">
                                                                                            <div class="font-semibold">НАПРАВЛЕНИЕ ИЛИ СПЕЦИАЛЬНОСТЬ ПО ДОКУМЕНТУ:</div>
                                                                                            <div>{{ $edu->documentSpeciality }}</div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </li>

                                                                </ul>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(count($subjects)>0)
                                            <div class="accordion" id="accordionSubjects">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingSubjects">
                                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSubjects" aria-expanded="false" aria-controls="collapseSubjects">
                                                            Преподаваемые дисциплины
                                                        </button>
                                                    </h2>
                                                    <div id="collapseSubjects" class="accordion-collapse collapse" aria-labelledby="headingSubjects" data-bs-parent="#accordionSubjects">
                                                        <ul class="accordion-body">
                                                            @foreach($subjects as $subject)
                                                                    <li class="border-b">
                                                                        {{ $subject->SubjectNameRU }}
                                                                    </li>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
