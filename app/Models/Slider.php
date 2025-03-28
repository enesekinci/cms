<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'height',
        'is_active'
    ];

    protected $casts = [
        'height' => 'integer',
        'is_active' => 'boolean'
    ];

    public function items()
    {
        return $this->hasMany(SliderItem::class);
    }
}
