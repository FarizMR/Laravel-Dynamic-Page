<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel
{
    protected $table = 'pages';

    protected $fillable = [
        'slug',
        'title',
    ];

    public function category()
    {
        return $this->hasMany(Category::class, 'page_id', 'id');
    }
}
