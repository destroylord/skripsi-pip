<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = [
        'full_name', 'gender', 'birth_place', 'birth_date', 'religion',
        'kindergarten', 'kindergarten_address', 'home_address', 'father_name',
        'father_address', 'father_birth_place', 'father_birth_date', 'mother_name',
        'mother_address', 'mother_birth_place', 'mother_birth_date',
        'birth_certificate', 'family_card', 'kindergarten_certificate'
    ];

    public function subCriterias() {

        return $this->belongsToMany(
            Subcriteria::class, 'student_criterias', 
        );
            
    
    }
   
}
