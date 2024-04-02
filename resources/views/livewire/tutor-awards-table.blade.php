<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            @if(count($awards)>0)
            <table id="tutorAwardsTable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Наименование</th>
                    <th>Вид</th>
                    <th>Дата присуждения</th>
                    <th>Дейиствия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($awards as $key => $award)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $award->honoraryTitleId }}</td>
                    <td>{{ $award->awardTypeId }}</td>
                    <td>{{ $award->awardDate }}</td>
                    <td class="d-flex align-items-center">
                        <form action="{{ route('tutor-award.destroy',$award->id) }}" method="post">
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
            @else
            <div>
                Пусто ....
            </div>
            @endif
        </div>
    </div>
</div>
