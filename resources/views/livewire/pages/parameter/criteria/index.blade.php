<div>

    <div class="table-responsive">
        
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="cardw-title">Form Kriteria</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p>Tambahkan sesuai kriteria yang diinginkan sehingga menjadikan kriteria tersebut menjadi akurat dalam perhitungan.
                            </p>
                        </div>
                        @include('livewire.pages.parameter.criteria.form')
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>List Kriteria</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-lg">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Nilai</th>
                                <th>Bobot</th>
                                <th>Tipe</th>
                                <th>Gunakan</th>
                                <th class="text-center">Opsi</th>
                            </tr>
                        </thead>
                    <tbody>

                <div>
                        @forelse ($criterias as $criteria)
                            <tr>
                                <td>{{ $criteria->name }}</td>
                                <td>{{ $criteria->score }}</td>
                                <td>{{ $criteria->weight }}</td>
                                <td>{{ $criteria->type }}</td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            wire:click="processMark({{ $criteria->id }})"
                                            {{ $criteria->is_active == App\Enum\ActiveEnum::ACTIVE->value ? 'checked' : '' }}
                                            type="checkbox"
                                            id="defaultCheck3"
                                        >
                                    </div>
                                </td>
                                <td>
                                    @if ($criteria->is_active == \App\Enum\ActiveEnum::ACTIVE->value)
                                        <div class="d-flex justify-content-center gap-2">   
                                            <button
                                                class="btn btn-warning mr-2"
                                                id="btn-edit"
                                                wire:click="editCriteria({{ $criteria->id }})"
                                                type="button"
                                            >
                                                <i class='bx bxs-edit'></i> Edit
                                            </button>
                                            <button
                                                class="btn btn-danger"
                                                type="button"
                                                wire:click="deleteCriteria({{ $criteria->id }})"
                                            >
                                                <i class='bx bxs-trash'></i> Delete
                                            </button>
                                        </div>
                                    @else
                                        <p class="text-center">Tidak Ada Opsi</p>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                        <tr>
                            <td><b>Total</b></td>
                            <td>{{ $criterias->sum('score') }}</td>
                            <td>{{ $criterias->sum('weight') }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


  @push('scripts')
      <script>

        Livewire.on('criteria-saved', () => {
        });

        Livewire.on('btn-edit', () => {
            Livewire.emit('btn-save');
        });
      </script>
  @endpush
</div>
