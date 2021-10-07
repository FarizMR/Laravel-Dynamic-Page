<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Rorecek\Ulid\HasUlid;

class BaseModel extends Model
{
    use HasUlid;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $casts = ['id' => 'string'];

    protected $keyType = 'string';
}
