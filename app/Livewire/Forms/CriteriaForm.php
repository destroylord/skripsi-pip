<?php

namespace App\Livewire\Forms;

use App\Enum\ActiveEnum;
use App\Models\Criteria;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CriteriaForm extends Form
{
    public $name = '';

    public $score = '';

    public $type = '';

    public $period_id = '';
    public $is_active = '';

    public $criteria = null;


    public function rules() : array
    {
        return 
            [
                'name' => 'required|string',
                'score' => 'required|numeric|min:0|max:100',
                'type' => 'required|string',
                'period_id' => 'required|exists:periods,id',
            ];
    }

    protected $messages = [
        'name.required' => 'The name field is required.',
        'score.required' => 'The score field is required.',
        'score.numeric' => 'The score must be a number.',
        'score.min' => 'The score must be at least 0.',
        'score.max' => 'The score must not be greater than 100.',
        'type.required' => 'The type field is required.',
        'period_id.required' => 'The period ID field is required.',
        'period_id.exists' => 'The selected period ID is invalid.',
    ];

    public function setCriteria(Criteria $criteria)
    {
        $this->criteria = $criteria;
        $this->name = $criteria->name;
        $this->score = $criteria->score;
        $this->type = $criteria->type;
        $this->period_id = $criteria->period_id;
        $this->is_active = $criteria->is_active;
    }

    public function save()
    {

        $this->validate();

        $data = [
            'name' => $this->name,
            'score' => $this->score,
            'weight' => $this->score / 100,
            'type' => $this->type,
            'period_id' => $this->period_id,
            'is_active' => ActiveEnum::INACTIVE->value,
        ];
        

        if(isset($this->criteria)) {
            $data['is_active'] = ActiveEnum::ACTIVE->value;
            $this->criteria->update($data);
        } else {
            $this->criteria = Criteria::create($data);
        }


    }

    public function updateCheckedCriteria(Criteria $criteria)
    {
        $isActive = $criteria->is_active === ActiveEnum::INACTIVE->value;
        $criteria->update([
            'is_active' => $isActive ? ActiveEnum::ACTIVE->value : ActiveEnum::INACTIVE->value,
            'score' => 0,
            'weight' => 0,
            'type' => $criteria->type,
        ]);

        
    }
}
