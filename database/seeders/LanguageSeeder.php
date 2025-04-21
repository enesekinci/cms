<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        Language::insert([
            [
                'name' => 'Türkçe',
                'code' => 'tr',
                'is_active' => true,
                'is_default' => true,
            ],
            [
                'name' => 'English',
                'code' => 'en',
                'is_active' => true,
                'is_default' => false,
            ],
            [
                'name' => 'German',
                'code' => 'de',
                'is_active' => true,
                'is_default' => false,
            ],
            [
                'name' => 'French',
                'code' => 'fr',
                'is_active' => true,
                'is_default' => false,
            ],
            [
                'name' => 'Spanish',
                'code' => 'es',
                'is_active' => true,
                'is_default' => false,
            ],
        ]);
    }
}
