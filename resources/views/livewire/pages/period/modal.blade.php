<div class="modal fade" 
      wire:ignore.self 
      id="period-modal" 
      tabindex="-1" 
      aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="modalCenterTitle">{{ $this->form->period ? 'Ubah' : 'Tambah'; }}Tahun Periode</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal"
        aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="savePeriod" action="#" method="POST">
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Periode</label>
            <input type="number" wire:model="form.name" class="form-control @error('name') is-invalid @enderror"
              placeholder="Enter Periode" />
            @error('name')
              <span>{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" 
            class="btn btn-outline-secondary"
            data-bs-dismiss="modal"
            >Close</button>
          <button type="submit" 
            class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
