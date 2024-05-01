<?php

namespace App\Livewire;

use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use Livewire\Component;

class NormalizationComponent extends Component
{

    public $query;

    public function mount(NormalizationRepository $normalizationRepository, AlternativeRepository $AlternativeRepository)
    {
        
        $this->query = $normalizationRepository->getCalculation($AlternativeRepository->index());
    }

    public function render()
    {
        return view('livewire.normalization-component');
    }
}
