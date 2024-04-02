<div>
    <div class="row mb-3">
        <label for="inputType" class="col-sm-3 col-form-label">Тип</label>
        <div class="col-sm-9">
            <select wire:model="form.type" id="inputType" class="form-select">
                <option value=null>Выбирать</option>
                @foreach($contentTypes as $t)
                    <option value={{ $t->contenttypeid }}>{{ $t->name }}</option>
                @endforeach
            </select>
            <div class="mt-2">
                @error('form.cafedraid') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputName" class="col-sm-3 col-form-label">Наименование страницы</label>
        <div class="col-sm-9">
            <input wire:model="form.name" id="inputName"  type="text" class="form-control" placeholder="Наименование страницы">
            <div class="mt-2">
                @error('form.name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputSubject" class="col-sm-3 col-form-label">Описания</label>
        <div class="col-sm-9">
            <textarea wire:model="form.subject" id="inputSubject" class="form-control" name="subject" rows="3" placeholder="Описания"></textarea>
            <div class="mt-2">
                @error('form.subject') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputSubject" class="col-sm-3 col-form-label">Контент</label>
        <div class="col-sm-9">
            @if($form->type==='8')
                <input wire:model="form.data" id="inputName" type="text" class="form-control"
                       placeholder="Youtube ссылка">
            @else
                <livewire:c-keditor :content="$form->data" :key="1" id="create"/>
                <div class="mt-2">
                    @error('form.data') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                {{--                <livewire:tiny-mce :key="1" id="create"/>--}}
            @endif
        </div>
    </div>

    <div class="row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <div type="button" wire:click.debounce.1000ms="save" class="btn btn-info px-5 text-white">
                <div wire:loading class="spinner-border spinner-border-sm text-light mr-2" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div> Изменить</div>
        </div>
    </div>
</div>

