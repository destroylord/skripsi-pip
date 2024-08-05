<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    use HasFactory;

    protected $table = 'alternatives';

    protected $fillable = [
        'student_id', 'criteria_id', 'value'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
