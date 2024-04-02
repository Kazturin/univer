<div class="card">
    <div class="card-body">
        <div>
            <form wire:submit="save">
                <div class="row mb-3">
                    <label for="inputType" class="col-sm-3 col-form-label">Вид награды, почетного звания</label>
                    <div class="col-sm-9">
                        <select wire:model.live="form.awardTypeId" id="inputType" class="form-select">
                            <option value=null>Выбирать</option>
                            @foreach($types as $type)
                                <option value={{ $type->id }}>{{ $type->nameru }}</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            @error('form.awardTypeId') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputAward" class="col-sm-3 col-form-label">Награда, почетное звание</label>
                    <div class="col-sm-9">
                        <select wire:model="form.honoraryTitleId" id="inputAward" class="form-select">
                            <option value="">Выбирать</option>
                            @foreach($awards as $award)
                                <option value={{ $award->id }}>{{ $award->nameru }}</option>
                            @endforeach
                        </select>
                        <div class="mt-2">
                            @error('form.honoraryTitleId') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-3 col-form-label">Дата присуждения</label>
                    <div class="col-sm-9">
                        <input wire:model="form.awardDate" id="inputDate"  type="date" class="form-control">
                        <div class="mt-2">
                            @error('form.awardDate') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-info px-5 text-white">Добавить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



