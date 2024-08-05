<?php

namespace App\Livewire;

use App\Livewire\Forms\SubCriteriaForm;
use App\Models\Criteria;
use App\Models\Subcriteria;
use App\Repositories\SubCriteriaRepository;
use Livewire\Component;

class SubCriteriaComponent extends Component
{

    public SubCriteriaForm $form;
    public $subCriterias;
    public $criterias;

    public function mount($criterias)
    {
        $this->criterias = $criterias;

    }

    public function save()
    {
        $this->form->save();
        $this->form->reset();
        $this->dispatch('subcriteria-updated');
    }

    public function editSubCriteria(Subcriteria $subCriteria)
    {
        $this->form->setSubCriteria($subCriteria);
        $this->dispatch('show-modal');
    }

    public function deleteSubCriteria(Subcriteria $subCriteria)
    {
        $subCriteria->delete();
        $this->dispatch('subcriteria-updated');
    }
    public function render()
    {
        // dump($this->form->parent_id);
        return view('livewire.pages.parameter.sub-criteria.index',[
            'subCriterias' => $this->subCriterias,
            'criterias' => $this->criterias
        ]);
    }
}
