<div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="#" wire:submit.prevent="uploadFile">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Periode</label>
                            <select class="form-select w-50" wire:model="form.period">
                                <option selected>-- Pilih Periode --</option>
                                @foreach($periods as $period)
                                    <option value="{{ $period->id }}">{{ $period->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload File</label>
                            <input class="form-control" wire:model="form.file" type="file" id="formFile" accept=".xlsx">
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Submit</button>
                        {{-- <span wire:loading.delay.class="d-block mt-2">Proses upload sedang berlangsung...</span> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>