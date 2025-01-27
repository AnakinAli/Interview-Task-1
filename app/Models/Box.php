<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\Colors;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'url', 'color',
    ];

    protected $casts = [
        'color' => Colors::class,
    ];
}
