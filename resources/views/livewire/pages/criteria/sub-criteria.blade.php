<?php

use function Livewire\Volt\{state, layout, computed, rules, boot, title, form, on};
use App\Models\{Criteria, SubCriteria};
use App\Livewire\Forms\SubCriteriaForm;
use App\Repositories\SubCriteriaRepository;


layout('layouts.app');
form(SubCriteriaForm::class);
title('Sub-Kriteria');

state([
    'criterias' => Criteria::all(),
    'subCriterias' => (new SubCriteriaRepository())->getGrouped(),
]);

$saveSubCriteria = function() {
    $this->form->save();
    $this->form->reset();

    $this->dispatch('subCriteria-saved');
};

$updateSubCriteria = function($id) {
    $subCriteria = SubCriteria::find($id);
    
    $this->form->setSubCriteria($subCriteria);
    $this->dispatch('show-modal');
};


$deleteSubCriteria = function (SubCriteria $subCriteria) {
    $subCriteria->delete();
};
 
on(['reset-form' => function () {
    $this->form->reset();
    $this->resetValidation();
}]);

?>


<div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Sub-Kriteria</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <p>Tambahkan sesuai kriteria yang diinginkan sehingga menjadikan kriteria tersebut menjadi akurat dalam perhitungan.
                        </p>
                    </div>
                
                    <button class="btn btn-primary w-25" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">+ Tambah Sub Kriteria</button>

                    <div class="col-lg-12 mt-4">
                        <form action="#">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Sub Kriteria</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                    @foreach ($this->subCriterias as $criteriaGroup)
                                        @php $firstRow = true; @endphp
                                        @foreach ($criteriaGroup as $subCriteria)
                                        <tr>
                                            <td>{{ $loop->iteration == 1 ? $subCriteria->criteria->name : '' }}</td>
                                            <td>{{ $subCriteria->name }}</td>
                                            <td>{{ $subCriteria->value }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" wire:click="updateSubCriteria({{ $subCriteria->id }})"><i class='bx bxs-edit' ></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" wire:click="deleteSubCriteria({{ $subCriteria->id }})"><i class='bx bxs-trash' ></i> </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                            </table>
                        </form>
                    </div>


                    {{-- Modal --}}
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
                                                        @foreach ($this->criterias as $criteria)
                                                            <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                                        @endforeach
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
                    
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            Livewire.on('show-modal', () => {
                $('#exampleModalCenter').modal('show');
            });

            $('#exampleModalCenter').on('hidden.bs.modal', () => {
                Livewire.dispatch('reset-form');
            })
            Livewire.on('subCriteria-saved', () => {
                $('#exampleModalCenter').modal('hide');
            });
        </script>
    @endpush
</div>
