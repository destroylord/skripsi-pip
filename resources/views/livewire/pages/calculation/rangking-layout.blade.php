<?php

use function Livewire\Volt\{state, layout, computed, rules, title};

layout('layouts.app');
title('Rangking')
?>

<div>
     <div class="row">
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