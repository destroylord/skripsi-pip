<?php

namespace App\Livewire;

use App\Models\Period;
use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use Livewire\Component;

class NormalizationComponent extends Component
{

    public $query;

    public $period_id = null;
    public function mount(NormalizationRepository $normalizationRepository, AlternativeRepository $AlternativeRepository, $period)
    {
        $this->period_id = $period ?? 1;
        $this->query = $normalizationRepository->getCalculation($AlternativeRepository->index(Period::find($this->period_id)));
    }

    public function render()
    {
        return view('livewire.normalization-component');
    }
}
