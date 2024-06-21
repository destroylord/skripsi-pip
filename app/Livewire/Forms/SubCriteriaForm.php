<?php

namespace App\Livewire\Forms;

use App\Models\Subcriteria;
use Livewire\Attributes\Rule;
use Livewire\Form;


class SubCriteriaForm extends Form
{

    #[Rule('required')]
    public $parent_id;

    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $value;

    public $subCriteria = null;

    public function setSubcriteria($subCriteria)
    {
        $this->subCriteria = $subCriteria;
        $this->parent_id = $subCriteria->parent_id;
        $this->name = $subCriteria->name;
        $this->value = $subCriteria->value;
    }

    public function save()
    {

        $this->validate();

        if ($this->subCriteria != null) {
            $this->subCriteria->update([
                'parent_id' => $this->parent_id,
                'name' => $this->name,
                'value' => $this->value
            ]);
            return;
        }

        Subcriteria::create([
            'parent_id' => $this->parent_id,
            'name' => $this->name,
            'value' => $this->value
        ]);
    }

}
