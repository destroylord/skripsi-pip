<?php

use function Livewire\Volt\{state, layout, computed, rules};
use App\Repositories\AlternativeRepository;

layout('layouts.app');
?>

<div>
    <div class="row">
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
</div>