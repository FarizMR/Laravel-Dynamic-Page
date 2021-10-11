<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends BaseModel
{
    protected $table = 'pages';

    protected $fillable = [
        'slug',
        'title',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function($page) {
            $page->slug = Str::slug($page->title,'-');
        });
    }

    public function category()
    {
        return $this->hasMany(Category::class, 'page_id', 'id');
    }
}
