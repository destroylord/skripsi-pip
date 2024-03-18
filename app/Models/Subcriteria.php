<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcriteria extends Model
{
    use HasFactory;

    protected $table = 'subcriterias';

    protected $fillable = [
        'parent_id',
        'name', 
        'value'
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class, 'parent_id', 'id');
    }
    
}
