<?php

use function Livewire\Volt\{state, layout, computed, rules, title};
use App\Repositories\AlternativeRepository;
use App\Models\{Criteria, Period};

layout('layouts.app');
title('Perhitungan SAW');

state(['filter'])->url();

$criterias = computed(fn() => Criteria::where('period_id', 'like', '%'.$this->filter.'%')->get());
$periods = computed(fn() => Period::all());
?>

<div>
    <div class="row">
         <div class="d-flex justify-content-center gap-2">
    <div class="nav-align-top mb-4">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item">
            <button
                type="button"
                class="nav-link active"
                role="tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-alternative"
                aria-controls="navs-pills-top-alternative"
                aria-selected="true">
                Alternative
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                id="comparison-tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-normalization"
                aria-controls="navs-pills-top-normalization"
                aria-selected="false">
                Normalisasi Matrix
            </button>
            </li>
            <li class="nav-item">
            <button
                type="button"
                class="nav-link"
                role="tab"
                id="comparison-tab"
                data-bs-toggle="tab"
                data-bs-target="#navs-pills-top-ranking"
                aria-controls="navs-pills-top-ranking"
                aria-selected="false">
                Perangkingan
            </button>
            </li>
            
        </ul>
    </div>
    <div>
        <select class="form-select" 
            id="exampleFormControlSelect1"
            wire:model.live="filter"
            wire:model="form.period_id">
            <option selected="">Pilih Periode </option>
            @foreach ($this->periods as $period)
                <option value="{{ $period->id }}">{{ $period->name }}</option>
            @endforeach
        </select>
    </div>
 </div>



        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-alternative" role="tabpanel">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Alternative
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <livewire:alternative-component/>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade show" id="navs-pills-top-normalization" role="tabpanel">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    Normalization
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <livewire:normalization-component/>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="tab-pane fade show" id="navs-pills-top-ranking" role="tabpanel">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link active"
                        role="tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home"
                        aria-controls="navs-pills-top-home"
                        aria-selected="true">
                        Rangking Seluruh Siswa
                    </button>
                    </li>
                    <li class="nav-item">
                    <button
                        type="button"
                        class="nav-link"
                        role="tab"
                        id="comparison-tab"
                        data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile"
                        aria-controls="navs-pills-top-profile"
                        aria-selected="false">
                        Penentuan Rangking Siswa
                    </button>
                    </li>
                </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <div class="table-responsive">
                        <livewire:rangking-component/>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-6">
                                 <div id="chart-donout"></div>
                            </div>
                        </div>

                     <div class="table-responsive">
                        <livewire:result/>
                    </div>
                </div>
            </div>
            </div>
        </div>
            </div>
            
        </div>


    </div>
</div>