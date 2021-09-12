<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Filter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'group_id'
    ];

    protected $casts = [
        'group_id'  =>  'integer'
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(FilterGroup::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
