<?php

namespace App\Livewire;


use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use Livewire\Component;

class Result extends Component
{

    public $students;

    public function mount(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository,
    )   
    {

        $alternatives = $AlternativeRepository->index();
        $normalized = $normalizationRepository->getCalculation($alternatives);
        $ranked = $rangkingRepository->getCalculation($normalized);

        $this->students = $rangkingRepository->getRangked($ranked->students)
            ->sortBy('full_name')
            ->where('type', 'tampil')
            ->take(39);
    
    }

    public function render()
    {
        return view('livewire.result');
    }
}
