<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SliderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'slider_id',
        'title',
        'description',
        'image',
        'button_text',
        'button_url',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
