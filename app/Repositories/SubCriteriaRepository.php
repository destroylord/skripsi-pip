<?php

namespace App\Repositories;

use App\Models\Criteria;
use App\Models\Subcriteria;

class SubCriteriaRepository 
{
    public function getGrouped()
    {
        return Criteria::all('id','type' )->map(function ($criteria) {
            if ($criteria->type == 'Cost') {
                return $criteria->subCriterias()->orderBy('value', 'desc')->get();
            }
            return $criteria->subCriterias()->get();
        });

    }
}
