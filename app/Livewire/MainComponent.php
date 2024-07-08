<?php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Period;
use Livewire\Attributes\On;
use Livewire\Component;

class MainComponent extends Component
{
    public $period = null;
    public $periods = [];


    public function mount()
    {
        $this->periods = Period::all();
    }

    public function updatedPeriod()
    {
        $this->dispatch('updated-period');
    }

    #[On('criteria-updated')]
    public function updateChecked()
    {
        $this->dispatch('updated-period');
    }

    public function render()
    {

        $criterias = ($this->period) 
                            ? Criteria::where('period_id', $this->period)->get() 
                            : Criteria::all();

        return view('livewire.pages.parameter.app', [
            'periods' => $this->periods,
            'criterias' => $criterias
        ])
        ->layout('layouts.app');
    }
}
