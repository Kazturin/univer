@extends("layouts.app")

@section("style")
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="d-none d-sm-flex align-items-center mb-3">
                <x-breadcrumbs class="mt-2"  :links="[['url'=>route('tutor.index'),'label'=>'ППС и сотрудники'],['label'=>' Повышение квалификации']]"></x-breadcrumbs>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{route('tutor-qualification.create',['tutor_id' => $tutor->TutorID])}}" type="button" class="btn btn-primary">Добавить</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">{{ $tutor->lastname .' '.$tutor->firstname.' '.$tutor->patronymic }}</h6>
            <hr/>
            <div class="card">
                <div class="card-body">
                    @if(session()->get('success'))
                        <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                            <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0 text-white">Успешно</h6>
                                    <div class="text-white">{{ session()->get('success') }}</div>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="qualificationsTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Форма повышения квалификации</th>
                                <th>Страна</th>
                                <th>Город</th>
                                <th>Наименование организации</th>
                                <th>Начало</th>
                                <th>Окончание</th>
                                <th>Объем(час)</th>
                                <th>Тематика</th>
                                <th>Источник финансирования</th>
                                <th>Вид документа</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($qualifications as $key => $qualification))
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $qualification->formLabel->NameRU }}</td>
                                    <td>{{ $qualification->country }}</td>
                                    <td>{{ $qualification->city }}</td>
                                    <td>{{ $qualification->place }}</td>
                                    <td>{{ $qualification->start }}</td>
                                    <td>{{ $qualification->finish }}</td>
                                    <td>{{ $qualification->length }}</td>
                                    <td>{{ $qualification->tematika }}</td>
                                    <td> {{ $financing[$qualification->paymentformid] }} </td>
                                    <td>
                                        @if($qualification->docType)
                                            {{ $docTypes[$qualification->docType] }}
                                        @endif
                                    </td>

                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('tutor-qualification.edit', $qualification->qualID) }}">
                                            <i class="bx bxs-edit me-1 font-22 text-info"></i>
                                        </a>
                                        <form action="{{ route('tutor-qualification.destroy',$qualification->qualID) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
                                                onclick="return confirm('Сенімді сіз бе?')"
                                                class="border-0"
                                                aria-label="Delete"
                                            >
                                                <i class="bx bxs-trash me-1 font-22 text-info"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#qualificationsTable').DataTable();
        } );

    </script>
@endsection
