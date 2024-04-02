@extends("layouts.app")

@section("wrapper")

    <div class="mb-3">
        <x-breadcrumbs class="mt-2"  :links="[['label'=>'Электронный журналы','url'=>route('tutor-journals')],
                 ['label'=>$groups[0]->SubjectNameRU]
                ]"></x-breadcrumbs>
    </div>

    @livewire('journal.journal',['groups' => $groups])

@endsection


