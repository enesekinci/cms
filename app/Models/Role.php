<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'display_name',
        'description',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            if (empty($role->display_name)) {
                $role->display_name = ucfirst($role->name);
            }
        });

        static::updating(function ($role) {
            if ($role->isDirty('name') && empty($role->display_name)) {
                $role->display_name = ucfirst($role->name);
            }
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
