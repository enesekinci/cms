<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'group',
        'key',
        'text',
    ];

    protected $casts = [
        'text' => 'array',
    ];
}
