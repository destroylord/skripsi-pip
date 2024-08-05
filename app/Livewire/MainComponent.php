<?php

namespace App\Livewire;

use App\Models\Criteria;
use App\Models\Period;
use App\Models\Subcriteria;
use App\Repositories\SubCriteriaRepository;
use Livewire\Attributes\On;
use Livewire\Component;

class MainComponent extends Component
{
    public $period = null;
    public $periods = [];
    public $tabs = true;

    public function mount()
    {
        $this->periods = Period::all();

    }

    public function updatedPeriod()
    {
        $this->dispatch('updated-period');
    }

    #[On('subcriteria-updated')]
    public function updateSubCriterias()
    {
        $this->dispatch('updated-subCriteria');
        $this->dispatch('hide-modal');
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
                            : collect([]);

        return view('livewire.pages.parameter.app', [
            'periods' => $this->periods,
            'criterias' => $criterias,
            'subCriterias' => (new SubCriteriaRepository())->getGrouped($criterias->pluck('id'))
        ])
        ->layout('layouts.app');
    }
}
