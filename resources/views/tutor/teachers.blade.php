@extends("layouts.app")

@section("style")
    @livewireStyles
@endsection

@section("wrapper")
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="d-none d-sm-flex align-items-center mb-3">
                <x-breadcrumbs class="mt-2"  :links="[['label'=>'ППС']]"></x-breadcrumbs>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{route('tutor.create')}}" type="button" class="btn btn-primary">Добавить преподователь</a>
                        {{--                        <button type="button" class="btn btn-primary">Добавить</button>--}}
                        {{--                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>--}}
                        {{--                        </button>--}}
                        {{--                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>--}}
                        {{--                            <a class="dropdown-item" href="javascript:;">Another action</a>--}}
                        {{--                            <a class="dropdown-item" href="javascript:;">Something else here</a>--}}
                        {{--                            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">ППС</h6>
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
                        <livewire:tutors-table/>
{{--                        <table id="teachersTable" class="table table-striped table-bordered" style="width:100%">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>ID</th>--}}
{{--                                <th>Фамилия</th>--}}
{{--                                <th>Имя</th>--}}
{{--                                <th>Отчество</th>--}}
{{--                                <th>Принят</th>--}}
{{--                                <th>Действия</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($teachers as $key => $teacher)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $key+1 }}</td>--}}
{{--                                    <td>{{ $teacher->lastname }}</td>--}}
{{--                                    <td> {{ $teacher->firstname }} </td>--}}
{{--                                    <td>{{ $teacher->patronymic }}</td>--}}
{{--                                    <td>{{ $teacher->StartDate }}</td>--}}
{{--                                    <td class="d-flex align-items-center">--}}
{{--                                        <a href="{{ route('tutor.edit', $teacher->TutorID) }}" title="Редактировать">--}}
{{--                                            <i class="bx bxs-edit me-1 font-22 text-info"></i>--}}
{{--                                        </a>--}}
{{--                                        <form action="{{ route('tutor.destroy',$teacher->TutorID) }}" method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button--}}
{{--                                                class="border-0"--}}
{{--                                                aria-label="Delete"--}}
{{--                                                title="Удалить"--}}
{{--                                            >--}}
{{--                                                <i class="bx bxs-trash me-1 font-22 text-info"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
    @livewireScripts

@endsection
