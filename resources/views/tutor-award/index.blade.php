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
                <x-breadcrumbs class="mt-2"  :links="[['url'=>route('tutor.index'),'label'=>'ППС и сотрудники'],['label'=>'Награды '.$tutor->lastname.' '.$tutor->firstname]]"></x-breadcrumbs>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{route('tutor-qualification.create',['tutor_id' => $tutor->TutorID])}}" type="button" class="btn btn-primary">Добавить</a>
                    </div>
                </div>
            </div>
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
            <div>
               <h6 class="mb-0 text-uppercase">Добавление наград</h6>
               <hr/>
               @livewire('create-tutor-award',['tutorId' => $tutor->TutorID])
            </div>
           <div>
               <h6 class="mb-0 text-uppercase">Список Наград</h6>
               <hr/>
               @livewire('tutor-awards-table',['tutorId' => $tutor->TutorID])
           </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section("script")
{{--    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#qualificationsTable').DataTable();--}}
{{--        } );--}}

{{--    </script>--}}
@endsection
