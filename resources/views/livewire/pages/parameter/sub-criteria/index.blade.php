<?php

use function Livewire\Volt\{state, layout, computed, rules, boot, title, form, on};
use App\Models\{Criteria, SubCriteria, Period};
use App\Livewire\Forms\SubCriteriaForm;
use App\Repositories\SubCriteriaRepository;

form(SubCriteriaForm::class);

state([
    'criterias' => Criteria::all(),
    'subCriterias' => (new SubCriteriaRepository())->getGrouped(),
]);

// On Create

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
    $this->dispatch('subCriteria-deleted');
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
                
                    <button class="btn btn-primary w-25" 
                        type="button" 
                        data-bs-toggle="modal" 
                        data-bs-target="#exampleModalCenter">+ Tambah Sub Kriteria</button>

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
                                    {{-- @foreach ($this->subCriterias as $criteriaGroup)
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
                                    @endforeach --}}
                                    </tbody>
                            </table>
                        </form>
                    </div>


                    {{-- Modal --}}
                    @include('livewire.pages.parameter.sub-criteria.modal')
                    
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
            Livewire.on('subCriteria-deleted', () => {
                alert('Sub Kriteria Terhapus');
            });

        </script>
    @endpush
</div>
