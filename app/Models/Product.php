<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'price',
        'stock',
    ];


    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Filter::class);
    }

    public function scopeStockProducts(Builder $query): Builder
    {
        return $query->orderByRaw('stock = 0', 'ASC');
    }
}
