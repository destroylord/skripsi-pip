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

    public function getRangked($students)
    {
        $sorted = $students->sortByDesc('result')->values();

        // Inisialisasi ranking dan nilai sebelumnya
        $ranking = 1;
        $previousNilai = null;
        $ranked = collect();

        foreach ($sorted as $index => $item) {
            if ($previousNilai !== $item['result']) {
                $ranking = $index + 1;
                $previousNilai = $item['result'];
            }
            $item['ranking'] = $ranking;
            $ranked->push($item);
        }

        return $ranked;

    }
}
