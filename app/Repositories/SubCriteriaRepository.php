<?php

namespace App\Repositories;

use App\Enum\ActiveEnum;
use App\Models\Criteria;
use App\Models\Subcriteria;

class SubCriteriaRepository 
{
    public function getGrouped($id)
    {
        return Criteria::select('id','type', 'is_active' )
            ->whereIn('id', $id)
            ->where('is_active', ActiveEnum::ACTIVE->value)
            ->get()->map(function ($criteria) {
            if ($criteria->type == 'Cost') {
                return $criteria->subCriterias()->orderBy('value', 'desc')->get();
            }
            return $criteria->subCriterias()->get();
        });

    }
}
