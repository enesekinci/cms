<?php

namespace App\Livewire\Translations;

use App\Models\Translation;
use App\Services\LanguageService;
use Livewire\Component;

class Create extends Component
{
    public $group;
    public $key;
    public $text = [];

    public function saveTranslation()
    {
        $this->validate([
            'group' => 'required|string|max:255',
            'key' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $exists = Translation::where('group', $this->group)
                        ->where('key', $value)
                        ->exists();

                    if ($exists) {
                        $fail('Bu grup ve anahtar kombinasyonu zaten mevcut.');
                    }
                },
            ],
            'text' => 'required|array',
        ]);

        Translation::create([
            'group' => $this->group,
            'key' => $this->key,
            'text' => $this->text,
        ]);

        $this->dispatch('success', ['message' => 'Çeviri başarıyla eklendi.']);
        return redirect()->route('translations.index');
    }

    public function render()
    {
        return view('livewire.translations.create', [
            'languages' => LanguageService::getInstance()->getLanguages(),
        ])->layout('layouts.dashboard');
    }
}
