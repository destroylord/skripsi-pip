<?php

namespace App\Livewire;

use App\Models\Period;
use App\Repositories\AlternativeRepository;
use Livewire\Component;

class AlternativeComponent extends Component
{

    public $query;
    public $period_id = null;


    public function mount(AlternativeRepository $alternativeRepository, $period)
    {
        $this->period_id = $period ?? 1;
        $this->query = $alternativeRepository->index(Period::find($this->period_id));
    }
    public function render()
    {
        // dump($this->period_id);
        return view('livewire.alternative-component');
    }
}
