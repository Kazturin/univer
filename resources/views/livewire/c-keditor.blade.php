<div>
    <div class="w-100 mx-auto mb-2">
        <div class="bg-white">
                <div>
                    <div wire:ignore>
                    <textarea wire:model="content"
                              wire:change="updatedContent($event.target.value)"
                              class="min-h-fit h-48"
                              name="content"
                              id="{{$id}}">{{ $content }}</textarea>
                    </div>
                </div>
            <div class="document-editor__toolbar">

            </div>
            <div id="editor">

            </div>
        </div>
    </div>
</div>
@assets
{{--<script src="{{asset('/ckeditor5/ckeditor.js')}}"></script>--}}
{{--<script src="{{asset('/ckeditor5/paste-from-office.js')}}"></script>--}}
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/decoupled-document/ckeditor.js"></script>
@endassets
@script
<script>
    DecoupledEditor
        .create( document.querySelector( '#editor'  ), {
            ckfinder:{
                uploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"
            },
        } )
        .then( editor => {
            const toolbarContainer = document.querySelector( '.document-editor__toolbar' );

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );

            window.editor = editor;
        } )
        .catch( err => {
            console.error( err );
        } );
    {{--ClassicEditor--}}
    {{--    .create( document.querySelector( '#{{ $id }}' ),{--}}
    {{--        // plugins: [ PasteFromOffice ],--}}
    {{--        ckfinder:{--}}
    {{--            uploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"--}}
    {{--        }--}}
    {{--    } )--}}
    {{--    .then( editor => {--}}
    {{--        editor.model.document.on('change:data', () => {--}}
    {{--        @this.set('content', editor.getData());--}}
    {{--        })--}}
    {{--    })--}}
    {{--    .catch( error => {--}}
    {{--        console.error( error );--}}
    {{--    } );--}}
</script>
@endscript
