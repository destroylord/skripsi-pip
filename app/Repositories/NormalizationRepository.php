<?php

namespace App\Repositories;

use App\Enum\ActiveEnum;

class NormalizationRepository 
{
    public function getCalculation(object $alternative)
    {

        $alternative->students->map( fn ($s) => $s->normalizations = collect());

        $alternative->criterias = $alternative->criterias->where('is_active', ActiveEnum::ACTIVE->value);
        foreach ($alternative->criterias as $key => $criteria) {
            
            $values = $alternative->students->map(function ($s) use ($key) {
                $alternative = $s->alternatives[$key]->first();
                return $alternative ? $alternative->value : null;
            })->toArray();

            $alternative->students->map(function ($s) use ($key, $values, $criteria) {

                $s->normalizations->push( $criteria->type == "Benefit" ? 
                    ($s->alternatives[$key]->first() ? ($s->alternatives[$key]->first()->value) / max($values ?: null) : null) :
                    (min($values) / ($s->alternatives[$key]->first() ? $s->alternatives[$key]->first()->value : null) ?: null) );
                    
            });
            
        }



        return (object) ['criterias' => $alternative->criterias, 'students' => $alternative->students];
    }
}
