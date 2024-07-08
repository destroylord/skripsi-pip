<?php

namespace App\Models;

use App\Enum\ActiveEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;
    
    protected $tables = 'criterias';

    protected $fillable = [
        'name', 'score', 'weight', 'type', 'is_active','period_id'
    ];

    protected $cast = [
        'is_active' => ActiveEnum::class
    ];

    public function subCriterias()
    {
        return $this->hasMany(Subcriteria::class, 'parent_id', 'id');
    }
}
