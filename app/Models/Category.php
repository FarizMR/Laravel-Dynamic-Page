<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $table = 'categories';

    protected $fillable = [
        'page_id',
        'title',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
