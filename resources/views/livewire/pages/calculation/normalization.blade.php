<?php

use function Livewire\Volt\{state, layout, computed, rules, title};

layout('layouts.app');
title('Normalization')

?>

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Normalisasi Matrix
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
</div>