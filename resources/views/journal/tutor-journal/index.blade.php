@extends("layouts.app")

@section("style")

@endsection

@section("wrapper")

            <div class="mb-3">
                <x-breadcrumbs class="mt-2"  :links="[['label'=>'Электронный журналы']]"></x-breadcrumbs>
            </div>

            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-8">
                @foreach($journals as $journal)
                    <a href="{{ route('tutor-journal.show',['tutorId'=>$journal->tutorid,'subjectId'=>$journal->subject->SubjectID]) }}"
                       class="rounded-lg bg-white overflow-hidden drop-shadow-lg cursor-pointer hover:drop-shadow-2xl" >
                        <div>
                            <div class="relative">
                                <img src="/assets/images/journal-bg.jpg" alt="books" class="opacity-90 w-full h-52 object-cover hover:opacity-100">
                                <div style="text-shadow: 2px 2px 8px #000" class="absolute top-4 left-4  text-white text-lg px-2 py-2">
                                    {{ $journal->subject->SubjectNameRU }}
                                </div>
                            </div>
                        </div>
                        <div class="py-2 px-4">
                            <div class="my-2 text-lg font-semibold">{{ $journal->subject->SubjectNameRU }}</div>
                        </div>
                    </a >
                @endforeach
            </div>

@endsection


