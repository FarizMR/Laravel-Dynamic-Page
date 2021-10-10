<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'unit',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
