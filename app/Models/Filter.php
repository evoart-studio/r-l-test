<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FilterGroup;
use App\Models\Product;

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

    public function group() {
        return $this->belongsTo(FilterGroup::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
