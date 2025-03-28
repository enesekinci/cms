<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    protected static function bootHasSlug()
    {
        static::creating(function ($model) {
            $model->slug = static::generateUniqueSlug($model->{$model->getSlugSource()});
        });

        static::updating(function ($model) {
            if ($model->isDirty($model->getSlugSource())) {
                $model->slug = static::generateUniqueSlug($model->{$model->getSlugSource()}, $model->id);
            }
        });
    }

    protected static function generateUniqueSlug(string $source, ?int $excludeId = null): string
    {
        $slug = Str::slug($source);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($excludeId, function ($query) use ($excludeId) {
                return $query->where('id', '!=', $excludeId);
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function getSlugSource(): string
    {
        return $this->slugSource ?? 'name';
    }
} 