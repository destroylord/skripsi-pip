<?php

use function Livewire\Volt\{state, layout, computed, rules, title, form};
use App\Livewire\Forms\CriteriaForm;
use App\Models\Criteria;

layout('layouts.app');
form(CriteriaForm::class);
title('Kriteria');


state([
    'total_score' => Criteria::sum('score'),
    'total_bobot' => Criteria::sum('weight')
]);

// For Foreach
$criterias = computed(fn() => Criteria::all());

// On Create
$saveCriteria = function () {
    $this->form->save();
    $this->form->reset();

    $this->dispatch('criteria-saved');
};

$updateCriteria = function ($id) {
    $criteria = Criteria::find($id);
     
    $this->form->setCriteria($criteria);

};

// On Delete
$deleteCriteria = function (Criteria $criteria) {
    $criteria->delete();
};

on(['reset-form' => function () {
    $this->form->reset();
    $this->resetValidation();
}]);
    
?>

<div>
  <div class="col-md-6">
    <div class="card mb-4">
        <div class="card-header">
            <h4 class="card-title">Form Kriteria</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <p>Tambahkan sesuai kriteria yang diinginkan sehingga menjadikan kriteria tersebut menjadi akurat dalam perhitungan.
                    </p>
                </div>
                <div class="col-md-12">
                    <form action="#" method="POST" autocomplete="off">
                        <div class="form-group col-form-label row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label for="first-name">Nama Kriteria</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" class="form-control" wire:model="form.name" placeholder="Contoh: Pekerjaan Orang tua">
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-form-label row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label for="last-name">Nilai</label>
                            </div>
                            <div class="col-lg-3 col-9">
                                <input type="number" class="form-control" wire:model="form.score" placeholder="Contoh: 10">
                                @error('score')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group col-form-label row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label for="last-name">Tipe</label>
                            </div>
                            <div class="col-lg-3 col-9">
                                <select name="type" wire:model="form.type" class="form-control" id="">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                                @error('type')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group col-form-label row align-items-center">
                            <div class="col-lg-2 col-3">
                                <button class="btn btn-primary" wire:click="saveCriteria" {{ ($total_score >= 100) ? 'disabled' : '' }}>Submit</button>
                            </div>
                        </div>
                    </form>
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
            <div class="table-responsive ">
                <table class="table table-hover table-lg">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Nilai</th>
                            <th>Bobot</th>
                            <th>Tipe</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                   <tbody>
                        @foreach ($this->criterias as $criteria)
                            <tr>
                                <td>
                                    {{ $criteria->name }}
                                </td>
                                <td>
                                    {{ $criteria->score }}
                                </td>
                                <td>
                                    {{ $criteria->weight }}
                                </td>
                                <td>
                                    {{ $criteria->type }}
                                </td>
                                <td>
                                    <div class="d-flex justify-self-center gap-2">
                                  
                                    <button 
                                        class="btn btn-warning mr-2"
                                        wire:click="updateCriteria({{ $criteria->id }})"
                                        type="button"> <i class='bx bxs-edit' ></i>Edit</a>
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                        wire:click="deleteCriteria({{ $criteria->id }})"
                                    >
                                    <i class='bx bxs-trash' ></i>
                                        Delete
                                    </button>
                                     </div>
                                </td>
                            </tr>
                        @endforeach
                          <tr>
                            <td><b>Total</b></td>
                            <td>{{ $total_score }}</td>
                            <td>{{ $total_bobot }}</td>
                            <td></td>
                            <td></td>
                         </tr>
                   </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
