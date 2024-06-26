<?php

namespace App\Repositories;


class NormalizationRepository 
{
    public function getCalculation(object $alternative)
    {

        $alternative->students->map( fn ($s) => $s->normalizations = collect());

        foreach ($alternative->criterias as $key => $criteria) {
            
            $values = $alternative->students->map(function ($s) use ($key) {
                return $s->alternatives[$key]->first()->value;
            })->toArray();

            $alternative->students->map(function ($s) use ($key, $values, $criteria) {

                $s->normalizations->push( $criteria->type == "Benefit" ? 
                    ($s->alternatives[$key]->first()->value) / max($values) :
                    (min($values) / $s->alternatives[$key]->first()->value));
                    
            });
            
        }

        return (object) ['criterias' => $alternative->criterias, 'students' => $alternative->students];
    }
}
