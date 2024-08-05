<?php

namespace App\Livewire;

use App\Models\Period;
use Livewire\Component;

class CalculationSawComponent extends Component
{
    public $period = null;
    public $periods = [];

    public function mount()
    {
        $this->periods = Period::all();
    }
    public function render()
    {
        return view('livewire.pages.calculation.app',[
            'periods' => $this->periods
        ])->layout('layouts.app');
    }
}
