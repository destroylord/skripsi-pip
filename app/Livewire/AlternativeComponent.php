<?php

namespace App\Livewire;

use App\Repositories\AlternativeRepository;
use Livewire\Component;

class AlternativeComponent extends Component
{

    public $query;


    public function mount(AlternativeRepository $alternativeRepository)
    {
        $this->query = $alternativeRepository->index();
    }
    public function render()
    {
        return view('livewire.alternative-component');
    }
}
