<div>
    <div class="w-100 mx-auto mb-2">
        <div class="bg-white">
            <div>
                <div>
                    <div wire:ignore>
                    <textarea wire:model="content"
                              wire:change="updatedContent($event.target.value)"
                              class="min-h-fit h-48"
                              name="content"
                              id="{{$id}}"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@assets
<script src="{{ asset('/assets/js/tinymce/tinymce.min.js') }}"></script>
@endassets

@script
    <script>
        tinymce.init({
            selector: '#{{ $id }}',
            relative_urls: false,
            height:400,
            advcode_inline: true,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern code"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media code",
            file_picker_callback : function(callback, value, meta) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = '/laravel-filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            },
            setup: function (editor) {
                // editor.on('init change', function () {
                //     editor.save();
                // });
                editor.on('blur', function (e) {
                @this.set('content', editor.getContent());
                    editor.save()
                });
            }
        });

        Livewire.on('close-edit-modal', () => {
            tinymce.remove('#{{ $id }}')
        });
        Livewire.on('close-modal', () => {
            tinymce.remove('#{{ $id }}')
        });
    </script>
@endscript
