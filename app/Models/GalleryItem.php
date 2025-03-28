<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'title',
        'description',
        'image',
        'order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
