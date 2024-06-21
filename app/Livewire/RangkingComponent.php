<?php

namespace App\Livewire;

use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use Livewire\Component;

class RangkingComponent extends Component
{

    
    public $criterias;
    public $students;

    public function mount(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository, )
    {

        $result = $rangkingRepository->getCalculation(
            $normalizationRepository->getCalculation($AlternativeRepository->index()),
        );

        $this->criterias = $result->criterias;
        $this->students = $rangkingRepository->getRangked($result->students);
    

    }

    public function render()
    {
        return view('livewire.rangking-component');
    }
}
