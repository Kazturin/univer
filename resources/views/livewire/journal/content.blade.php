<div>
    <ul class="flex rounded-md  overflow-hidden">
        @for ($i = 0; $i < 15; $i++)
            <li role="button" wire:click="selectWeek({{ $i+1 }})"
                class="py-2 px-3 border border-purple-600 {{ $i+1==$currentWeek?'bg-purple-500 text-white':'bg-white text-purple-500' }} ">{{ $i+1 }}</li>
        @endfor
    </ul>
    <div class="my-4">
        <button  wire:click="$dispatch('openModal', { component: 'journal.content-data-create', arguments: { contentId: {{$content->contentid}} ,week: {{ $currentWeek }} }})"
                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            {{ __('button.add') }}
            <span class="ml-2" aria-hidden="true">+</span>
        </button>
    </div>

    <div class="accordion my-4" id="accordionTarget">
        <x-accordion :title="'Цели и задачи изучения дисциплины на '. $currentWeek .' неделе'">
            <div class="accordion-body">
               <livewire:journal.content-week :contentId="$content->contentid" :week="$currentWeek" :key="$currentWeek"/>
            </div>
        </x-accordion>
{{--        <div class="accordion-item">--}}
{{--            <h2 class="accordion-header" id="headingTarget">--}}
{{--                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"--}}
{{--                        data-bs-target="#collapseTarget" aria-expanded="false" aria-controls="collapseTarget">--}}
{{--                    Цели и задачи изучения дисциплины на {{ $currentWeek }} неделе--}}
{{--                </button>--}}
{{--            </h2>--}}
{{--            <div id="collapseTarget" class="accordion-collapse collapse" aria-labelledby="headingTarget"--}}
{{--                 data-bs-parent="#accordionTarget">--}}
{{--                <div class="accordion-body">--}}
{{--                    <livewire:journal.content-week :contentId="$content->contentid" :week="$currentWeek" :key="$currentWeek"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="my-2 py-2 border-bottom-2">
        <h5>Электронный учебный контент {{ $currentWeek }} недели</h5>
    </div>
    <div>
        <livewire:journal.content-data-list :contentId="$content->contentid" :week="$currentWeek" :key="$currentWeek"/>
        {{--        @livewire('journal.content-data-list',['contentId' => $content->contentid,'week'=>$currentWeek], key="$currentWeek")--}}
    </div>

{{--    <div class="div">--}}
{{--        <!--CREATE CONTENT DATA MODAL -->--}}
{{--        <div class="modal fade" id="createContentModal" tabindex="-1" aria-hidden="true">--}}
{{--            <div class="modal-dialog modal-xl">--}}
{{--                <div class="modal-content">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title">Добавить контент</h5>--}}
{{--                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <livewire:journal.content-data-create :contentId="$content->contentid" :week="$currentWeek"--}}
{{--                                                              :key="$currentWeek"/>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@section("script")

    <script>
        Livewire.on('close-modal', () => {
            $('#createContentModal').modal('hide');
        });
        Livewire.on('create-content-modal', () => {
            $('#createContentModal').modal('show');
        });
    </script>
    {{--    <script src="{{asset('/ckeditor5/ckeditor.js')}}"></script>--}}
    {{--    <script>--}}
    {{--       ClassicEditor--}}
    {{--            .create( document.querySelector( '#inputContent' ),{--}}
    {{--                ckfinder:{--}}
    {{--                    uploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"--}}
    {{--                }--}}
    {{--            } )--}}
    {{--           .then(editor => {--}}
    {{--               var myTextArea = document.getElementById('inputContent');--}}
    {{--               editor.model.document.on('change:data', () => {--}}
    {{--                   const content = editor.getData()--}}
    {{--                   myTextArea.innerHTML = content;--}}
    {{--                   console.log(content); // Вы можете сделать что-то с полученным содержимым, например, отправить на сервер--}}
    {{--               });--}}
    {{--           })--}}
    {{--            .catch( error => {--}}
    {{--                console.error( error );--}}
    {{--            } );--}}
    {{--    </script>--}}
    @yield('child_script')
@endsection
