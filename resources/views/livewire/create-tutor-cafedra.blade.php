<div>
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
    <div class="row mb-3">
        <label for="inputCafedra" class="col-sm-3 col-form-label">Кафедра</label>
        <div class="col-sm-9">
            <select wire:model="form.cafedraid" id="inputCafedra" class="form-select">
                <option value=null>Выбирать</option>
                @foreach($cafedras as $c)
                    <option value={{ $c->cafedraID }}>{{ $c->cafedraNameKZ }}</option>
                @endforeach
            </select>
            <div class="mt-2">
                @error('form.cafedraid') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputPosition" class="col-sm-3 col-form-label">Должность</label>
        <div class="col-sm-9">
            <select wire:model="form.position" id="inputPosition" class="form-select">
                <option value="">Выбирать</option>
                @foreach($jobTitles as $title)
                    <option value={{ $title->ID }}>{{ $title->NameKZ }}</option>
                @endforeach
            </select>
            <div class="mt-2">
                @error('form.position') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputRate" class="col-sm-3 col-form-label">Ставка</label>
        <div class="col-sm-9">
            <input wire:model="form.rate" id="inputRate"  type="text" inputmode="numeric" class="form-control" placeholder="Ставка">
            <div class="mt-2">
                @error('form.rate') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputType" class="col-sm-3 col-form-label">Позиция</label>
        <div class="col-sm-9">
            <select wire:model="form.type" id="inputType" class="form-select">
                <option value="">Выбирать</option>
                <option value=0>Штатный</option>
                <option value=1>По внутреннему совместительству</option>
                <option value=2>По внешнему совместительству</option>
            </select>
            <div class="mt-2">
                @error('form.type') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="inputStatus" class="col-sm-3 col-form-label">Статус</label>
        <div class="col-sm-9">
            <select wire:model="form.deleted" id="inputStatus" class="form-select">
                <option value="">Выбирать</option>
                <option value=0>Работает</option>
                <option value=1>Не работает</option>
            </select>
            <div class="mt-2">
                @error('form.deleted') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9">
            <button type="button" wire:click="save" class="btn btn-info px-5 text-white">Прикрепить к кафедре</button>
        </div>
    </div>
</div>


