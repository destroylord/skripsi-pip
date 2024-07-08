<?php

namespace App\Enum;

enum ActiveEnum: string
{

    case ACTIVE = "active";
    case INACTIVE = "inactive";


    // public function label(): string
    // {
    //     $label = [
    //         self::ACTIVE => 'active',
    //         self::INACTIVE => 'inactive'
    //     ];

    //     return $label[$this->value];
    // }
}