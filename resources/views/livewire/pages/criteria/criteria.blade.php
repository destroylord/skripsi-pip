<?php

use function Livewire\Volt\{state, layout, computed, rules};
use App\Models\Criteria;

layout('layouts.app');


state([
    'name' => '',
    'score' => '',
    'weight' => '',
    'type' => ''
]);

state([
    'total_score' => Criteria::sum('score'),
    'total_bobot' => Criteria::sum('weight')
]);

// For Foreach
$criterias = computed(fn() => Criteria::all());

// Validation
rules([
    'name' => 'required|min:3',
    'score' => 'required',
    'type' => 'required'
]);

// On Create
$submit = function () {
    $this->validate();

    $score = $this->score;
    
    Criteria::create([
        'name' => $this->name,
        'score' => $score,
        'weight' => $score / 100,
        'type' => $this->type
    ]);

    // After Create input null
    $this->name = '';
    $this->score = '';
    $this->type = '';
};

// On Form Edit


// On Delete
$deleteCriteria = function (Criteria $criteria) {
    $criteria->delete();
}
    
?>

<div>
  <div class="col-md-6">
    <div class="card">
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
                    <form action="#" wire:submit="submit" method="POST" autocomplete="off">
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label" for="first-name">Nama Kriteria</label>
                            </div>
                            <div class="col-lg-10 col-9">
                                <input type="text" class="form-control" wire:model="name" placeholder="Contoh: Pekerjaan Orang tua">
                                @error('name')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label" for="last-name">Nilai</label>
                            </div>
                            <div class="col-lg-3 col-9">
                                <input type="number" class="form-control" wire:model="score" placeholder="Contoh: 10">
                                @error('score')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <label class="col-form-label" for="last-name">Tipe</label>
                            </div>
                            <div class="col-lg-3 col-9">
                                <select name="type" wire:model="type" class="form-control" id="">
                                    <option value="" selected disabled>Pilih</option>
                                    <option value="Benefit">Benefit</option>
                                    <option value="Cost">Cost</option>
                                </select>
                                @error('type')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row align-items-center">
                            <div class="col-lg-2 col-3">
                                <button class="btn btn-primary" {{ ($total_score >= 100) ? 'disabled' : '' }}>Submit</button>
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
                                    <button 
                                        class="btn btn-warning mr-2"
                                        wire:click="updatedCriteria({{ $criteria->id }})"
                                        type="button">Edit</a>
                                    <button
                                        class="btn btn-danger"
                                        type="button"
                                        wire:click="deleteCriteria({{ $criteria->id }})"
                                    >
                                        Delete
                                    </button>
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
