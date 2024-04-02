<div class="p-4 w-full">
    <div class="flex items-start justify-between py-2 border-b rounded-t">
        <h3 class="text-xl font-semibold">
            Добавить контент
        </h3>
        <button wire:click="$dispatch('closeModal', { component: 'content-data-create' })" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
        </button>
    </div>
    <div class="grid grid-cols-1 gap-6 mt-4">
        <div class="col-span-full">
            <label for="inputType" class="text-sm font-medium text-gray-900 block mb-2">Тип</label>
            <select id="inputType" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="parent_id">
                @foreach($contentTypes as $t)
                    <option value={{ $t->contenttypeid }}>{{ $t->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-span-full">
            <label for="inputName" class="text-sm font-medium text-gray-900 block mb-2">Наименование страницы</label>
            <input wire:model="form.name" id="inputName"  type="text" placeholder="Наименование страницы"
                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2"
                   required>
            <div class="mt-2">
                @error('form.name') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-span-full">
            <label for="inputDescription" class="text-sm leading-6">Описания</label>
            <textarea wire:model="form.subject"
                      id="inputDescription"
                      class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                      rows="3"
                      placeholder="Описания"></textarea>
            <div class="mt-2">
                @error('form.subject') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-span-full">
            <label for="inputContent" class="col-sm-3 col-form-label">Контент</label>
{{--            <div wire:ignore>--}}
{{--                <input wire:model="form.data" type="hidden"--}}
{{--                       id="editor-content"--}}
{{--                       class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2"--}}
{{--                >--}}
{{--            </div>--}}

            <div id="toolbar-container">
            </div>
            <div id="editor">
            </div>
            <div>
                {{ $form->data }}
            </div>

            <div class="mt-2">
                @error('form.data') <span class="error text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div x-data="counter" class="py-6 border-t border-gray-200 rounded-b">
            <button type="button" id="saveBtn" x-on:click="increment" class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Сохранить
            </button>
        </div>
    </div>
</div>
@assets
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/decoupled-document/ckeditor.js"></script>
@endassets
@script
<script>
    Alpine.data('counter', () => {
        return {
            count: 0,
            increment() {
               // Livewire.dispatch('editorContentUpdated', {value: editor.getData()});
                $wire.editorContentUpdated(editor.getData())
                $wire.save();
                console.log('yyy');
            },
        }
    })
    document.addEventListener('livewire:init', () => {

        document.getElementById("saveBtn").addEventListener("click", saveEditorContent);
        console.log('test')
        function saveEditorContent() {
            console.log('test')
            Livewire.dispatch('editorContentUpdated', {value: editor.getData()});
            Livewire.dispatch('save');
        }
    })
    DecoupledEditor
        .create( document.querySelector( '#editor'  ), {
            ckfinder:{
                uploadUrl: "{{route('ckeditor.image-upload', ['_token' => csrf_token() ])}}"
            },
        } )
        .then( editor => {
            const toolbarContainer = document.querySelector( '#toolbar-container' );
            // const editorContentInput = document.querySelector( '#editor-content' );

        //     editor.model.document.on( 'change:data', () => {
          //   @this.set('editorContent', editor.getData());
             //    editorContentInput.value = editor.getData();
               //  $wire.dispatch('post-created');
              //   $wire.dispatch('editorContentUpdated', {value: editor.getData()});
          //   });

            toolbarContainer.appendChild( editor.ui.view.toolbar.element );

            window.editor = editor;
        } )
        .catch( err => {
            console.error( err );
        } );





</script>
@endscript


