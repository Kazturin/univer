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
                <x-breadcrumbs class="mt-2"  :links="[['label'=>'Структура ВУЗа']]"></x-breadcrumbs>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="{{route('department.create')}}" type="button" class="btn btn-primary">Добавить подразделение</a>
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
            <h6 class="mb-0 text-uppercase">Подразделения</h6>
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
                        <table id="departmentTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th>Наименование(kz)</th>
                                <th>Руководитель</th>
                                <th>Тип</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tfoot style="display: table-header-group">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->nameru }}</td>
                                    <td> {{ $department->director?->lastname.' '. $department->director?->firstname }} </td>
                                    <td>{{ $department_types[$department->subdivision_type] }}</td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('department.edit', $department->id) }}">
                                            <i class="bx bxs-edit me-1 font-22 text-info"></i>
                                        </a>
                                        <form action="{{ route('department.destroy',$department->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button
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

            $('#departmentTable').DataTable({
                initComplete: function() {
                    this.api().columns([2]).every(function() {

                        var column = this;
                        var select = $('<select class="col'+column+'"><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column
                                    .search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });
                        column.data().unique().sort().each(function(d, j) {
                            var val = $('<div/>').html(d).text();
                            select.append('<option value="' + val + '">' + val + '</option>');
                        });
                    });
                }
            });


            // new DataTable('#departmentTable', {
            //     initComplete: function () {
            //         this.api()
            //             .columns()
            //             .every(function () {
            //                 let column = this;
            //
            //                 // Create select element
            //                 let select = document.createElement('select');
            //                 select.add(new Option(''));
            //                 column.footer().replaceChildren(select);
            //
            //                 // Apply listener for user change in value
            //                 select.addEventListener('change', function () {
            //                     var val = DataTable.util.escapeRegex(select.value);
            //
            //                     column
            //                         .search(val ? '^' + val + '$' : '', true, false)
            //                         .draw();
            //                 });
            //
            //                 // Add list of options
            //                 column
            //                     .data()
            //                     .unique()
            //                     .sort()
            //                     .each(function (d, j) {
            //                         select.add(new Option(d));
            //                     });
            //             });
            //     }
            // });
        } );


    </script>
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            var table = $('#example2').DataTable( {--}}
{{--                lengthChange: false,--}}
{{--                buttons: [ 'copy', 'excel', 'pdf', 'print']--}}
{{--            } );--}}

{{--            table.buttons().container()--}}
{{--                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );--}}
{{--        } );--}}
{{--    </script>--}}
@endsection
