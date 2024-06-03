<?php

namespace App\Livewire\Forms;

use App\Models\Criteria;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CriteriaForm extends Form
{
    public $name;
    public $score;
    public $type;


    public $criteria = null;
    public function setCriteria($criteria)
    {
        $this->name = $criteria->name;
        $this->score = $criteria->score;
        $this->type = $criteria->type;
    }

    public function save()
    {

        $this->validate();

        if ($this->criteria != null) {
            $this->criteria->update([
                'name' => $this->name,
                'score' => $this->score,
                'type' => $this->type / 100
            ]);
            return;
        }

        Criteria::create([
            'name' => $this->name,
            'score' => $this->score,
            'type' => $this->type / 100
        ]);
    }
}
