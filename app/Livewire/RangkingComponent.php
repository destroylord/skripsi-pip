<?php

namespace App\Livewire;

use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use Livewire\Component;

class RangkingComponent extends Component
{

    
    public $query;

    public function mount(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository, )
    {


        $this->query = $rangkingRepository->getCalculation(
            $normalizationRepository->getCalculation($AlternativeRepository->index()),
        );
    
    }

    public function render()
    {
        return view('livewire.rangking-component');
    }
}
