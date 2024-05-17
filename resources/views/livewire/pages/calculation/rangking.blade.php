<?php

use function Livewire\Volt\{state, layout, computed, rules, title};

layout('layouts.app');
title('Rangking')
?>

<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                       Rangking
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <livewire:rangking-component/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>