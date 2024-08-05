<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function criterias() {

        return $this->hasMany(Criteria::class);
    }

    public function students() {

        return $this->belongsToMany(Student::class, 'period_students');
    
    }
}
