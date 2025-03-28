<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Popup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'button_text',
        'button_url',
        'button_target',
        'start_date',
        'end_date',
        'display_delay',
        'display_duration',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'display_delay' => 'integer',
        'display_duration' => 'integer',
        'is_active' => 'boolean'
    ];
}
