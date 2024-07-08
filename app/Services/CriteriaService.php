<?php

namespace App\Services;

use App\Enum\ActiveEnum;
use App\Livewire\Forms\CriteriaForm;
use App\Models\Criteria;

class CriteriaService
{
    public function getTotalScore()
    {
        return Criteria::sum('score');
    }

    public function getTotalBobot()
    {
        return Criteria::sum('weight');
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

    public function save(CriteriaForm $form)
    {
        $form->save();
    }

    public function find($id)
    {
        return Criteria::find($id);
    }

    public function deleted($criteria)
    {
        $criteria->delete();
    }

    public function getAll()
    {
        return Criteria::all();
    }
}