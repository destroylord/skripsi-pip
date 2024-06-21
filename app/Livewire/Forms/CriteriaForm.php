<?php

namespace App\Livewire\Forms;

use App\Models\Criteria;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CriteriaForm extends Form
{
    #[Rule('required')]
    public $name;
    #[Rule('required')]
    public $score;
    #[Rule('required')]
    public $type;


    public $criteria = null;
    public function setCriteria($criteria)
    {

        $this->criteria = $criteria;
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
                'weight' => $this->score / 100,
                'type' => $this->type 
            ]);

            return;
        }

        Criteria::create([
            'name' => $this->name,
            'score' => $this->score,
            'weight' => $this->score / 100,
            'type' => $this->type 
        ]);
    }
}
