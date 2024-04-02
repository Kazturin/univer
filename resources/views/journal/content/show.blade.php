@extends("layouts.app")

@section("style")
    @livewireStyles
@endsection

@section("wrapper")
    <div class="page-wrapper">
        <div class="page-content">
            <div class="d-none d-sm-flex align-items-center mb-3">
                <x-breadcrumbs class="mt-2"  :links="[['label'=>'Учебный контент дисциплины','url'=>route('content.index')],['label'=>$content->contentname]]"></x-breadcrumbs>
            </div>

            <div class="card">
                <div class="card-body">
                    @livewire('journal.content',['content' => $content])
                </div>
            </div>
        </div>
    </div>

@endsection

@section("script")
    @livewireScripts

@endsection
