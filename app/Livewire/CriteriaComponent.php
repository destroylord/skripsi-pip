<?php

namespace App\Livewire;

use App\Livewire\Forms\CriteriaForm;
use App\Livewire\Forms\CriteriaForm2;
use App\Services\CriteriaService;
use Livewire\Component;
use App\Models\Criteria;
use App\Models\Period;

class CriteriaComponent extends Component
{

    public CriteriaForm $form;
    public $totalScore;
    public $totalBobot;
    public $selectedCriteriaId;

    protected CriteriaService $criteriaService;

    public $criterias;


    public function mount(CriteriaService $criteriaService, $criterias, $period)
    {
    
        $this->form->period_id = $period;
        $this->criteriaService = $criteriaService;
        $this->criterias = $criterias;
        
    }


    public function processMark(Criteria $criteria)
    {

       $this->form->updateCheckedCriteria($criteria);
       $this->dispatch('criteria-updated');

    }

    public function saveCriteria()
    {
        
        $this->form->save();
        $this->dispatch('criteria-updated');
    }

    public function editCriteria($id)
    {        
        $this->form->setCriteria(Criteria::find($id));
        $this->selectedCriteriaId = $id;
    }

    public function deleteCriteria(Criteria $criteria)
    {
        $criteria->delete();
        $this->dispatch('criteria-updated');
    }

    public function render()
    {
        return view('livewire.pages.parameter.criteria.index');
    }
}
