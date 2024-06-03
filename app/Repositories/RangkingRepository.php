<?php

namespace App\Repositories;

class RangkingRepository 
{
    public function getCalculation(object $alternative)
    {
        $alternative->students->map( fn ($s) => $s->rangkings = collect());

  
        $alternative->criterias->map(function ($c, $i) use ($alternative) {
            $alternative->students->map(function ($s) use ($c, $i) {
                $s->rangkings->push(
                    $c->weight * $s->normalizations[$i]
                );
            });
        });

        $alternative->students->map(function ($s) {
            $s->result = $s->rangkings->sum();
        });

        $alternative->students = $alternative->students->sortBy('result')->values();

        return (object) ['criterias' => $alternative->criterias, 'students' => $alternative->students];
    }
}
