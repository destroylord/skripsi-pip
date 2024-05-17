<?php

use function Livewire\Volt\{state, layout, computed, rules, boot, title};
use App\Models\{Criteria, SubCriteria};


layout('layouts.app');
title('Sub-Kriteria');

state([
    'criterias' => Criteria::with('subCriterias')->get(),
    'parentCriteria' => '',
    'subCriteriaName' => '',
    'subCriteriaValue' => '',
]);


$addSubCriteria = function() {
    SubCriteria::create([
        'parent_id' => $this->parentCriteria,
        'name' => $this->subCriteriaName,
        'value' => $this->subCriteriaValue,
    ]);

    $this->resetForm();
};

$resetForm = function() {
    $this->subCriteriaName = '';
    $this->subCriteriaValue = '';
    $this->parentCriteria = '';
    $this->selectedSubCriteria = null;
};


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
                                    @foreach ($this->criterias->groupBy('name') as $criteriaName => $criteriaGroup)
                                        @php $firstRow = true; @endphp
                                        @foreach ($criteriaGroup->first()->subCriterias as $subCriteria)
                                        <tr>
                                            <td>@if($firstRow) {{ $criteriaName }} @php $firstRow = false; @endphp @endif</td>
                                            <td>{{ $subCriteria->name }}</td>
                                            <td>{{ $subCriteria->value }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"><i class='bx bxs-edit' ></i></a>
                                                <a href="#" class="btn btn-sm btn-danger"><i class='bx bxs-trash' ></i> </a>
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
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                    <select name="" wire:model="parentCriteria" class="form-select" id="">
                                                        <option value="">-- Pilih Kriteria --</option>
                                                        @foreach ($this->criterias as $criteria)
                                                            <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                                                        @endforeach
                                                    </select>
                                                      @error('parentCriteria')
                                                        <span>{{ $message }}</span>
                                                      @enderror
                                                </div>
                                                <div class="mb-3">                                             
                                                    <input type="text" wire:model="subCriteriaName" class="form-control" placeholder="Sub Kriteria">
                                                    @error('subCriteriaName')
                                                        <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" wire:model="subCriteriaValue" class="form-control" placeholder="Nilai Sub Kriteria">
                                                    @error('subCriteriaValue')
                                                        <span>{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary ms-1"                  wire:click="addSubCriteria"
                                                data-bs-dismiss="modal">
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
</div>
