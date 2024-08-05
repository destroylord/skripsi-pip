<?php

namespace App\Livewire;

use App\Models\Period;
use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use Livewire\Component;

class RangkingComponent extends Component
{

    
    public $criterias;
    public $students;
    public $period_id = null;

    public function mount(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository,
        $period    
    )
    
    {

        $this->period_id = $period ?? 1;
        $result = $rangkingRepository->getCalculation(
            $normalizationRepository->getCalculation($AlternativeRepository->index(Period::find($this->period_id))),
        );

        $this->criterias = $result->criterias;
        $this->students = $rangkingRepository->getRangked($result->students);

    }

    public function render()
    {
        return view('livewire.rangking-component');
    }
}
