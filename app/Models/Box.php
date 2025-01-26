<?php

namespace App\Models;

use App\Enums\Colors;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    protected $fillable = [
        'title', 'url', 'color',
    ];

    protected $casts = [
        'color' => Colors::class,
    ];
}
