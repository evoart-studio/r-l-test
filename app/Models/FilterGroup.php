<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Filter;

class FilterGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function filters() {
        return $this->hasMany(Filter::class, 'group_id', 'id');
    }
}
