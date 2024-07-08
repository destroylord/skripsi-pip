<div class="card">
    <div class="card-content">
        <div class="card-body">
            <!-- Vertically Centered modal Modal -->
            <div class="modal fade" wire:ignore.self id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Sub Kriteria</h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <select name="" wire:model="form.parent_id" class="form-select" id="">
                                    <option value="">-- Pilih Kriteria --</option>
                                    {{-- @foreach ($this->criterias as $criteria)
                                        <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                    @endforeach --}}
                                </select>
                                    @error('form.parent_id')
                                    <span>{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">                                             
                                <input type="text" wire:model="form.name" class="form-control" placeholder="Sub Kriteria">
                                @error('form.name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="number" wire:model="form.value" class="form-control" placeholder="Nilai Sub Kriteria">
                                @error('form.value')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary ms-1" wire:click="saveSubCriteria">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>