<?php

namespace App\Livewire;

use App\Models\Period;
use App\Repositories\AlternativeRepository;
use App\Repositories\NormalizationRepository;
use App\Repositories\RangkingRepository;
use Livewire\Component;

class Result extends Component
{

    public $students;
    public $period_id = null;
    public $series = [];

    public function mount(
        RangkingRepository $rangkingRepository, 
        NormalizationRepository $normalizationRepository, 
        AlternativeRepository $AlternativeRepository,
        $period
    )   
    {

        $this->period_id = $period ?? 1;

        $alternatives = $AlternativeRepository->index(Period::find($this->period_id));
        $normalized = $normalizationRepository->getCalculation($alternatives);
        $ranked = $rangkingRepository->getCalculation($normalized);

        $this->students = $rangkingRepository->getRangked($ranked->students)
            ->sortBy('full_name')
            ->where('type', 'tampil')
            ->take(39);
        $this->series = [
            $this->students->filter(fn($student) => $student->ranking <= 39)->count(),
            $this->students->filter(fn($student) => $student->ranking > 39)->count()
        ];
        

    }

    public function render()
    {
        $this->dispatch('update-chart', $this->series);
        return view('livewire.result');
    }
}
