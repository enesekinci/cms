<?php

namespace App\Livewire\Translations;

use App\Models\Translation;
use App\Services\LanguageService;
use Livewire\Component;

class Edit extends Component
{
    public $edit_id;
    public $edit_group;
    public $edit_key;
    public $edit_text = [];

    public function mount($id)
    {
        $translation = Translation::findOrFail($id);
        $this->edit_id = $translation->id;
        $this->edit_group = $translation->group;
        $this->edit_key = $translation->key;
        $this->edit_text = $translation->text;
    }

    public function updateTranslation()
    {
        $this->validate([
            'edit_group' => 'required|string|max:255',
            'edit_key' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $exists = Translation::where('group', $this->edit_group)
                        ->where('key', $value)
                        ->where('id', '!=', $this->edit_id)
                        ->exists();

                    if ($exists) {
                        $fail('Bu grup ve anahtar kombinasyonu zaten mevcut.');
                    }
                },
            ],
            'edit_text' => 'required|array',
        ]);

        $translation = Translation::findOrFail($this->edit_id);
        $translation->update([
            'group' => $this->edit_group,
            'key' => $this->edit_key,
            'text' => $this->edit_text,
        ]);

        $this->dispatch('success', ['message' => 'Çeviri başarıyla güncellendi.']);
        return redirect()->route('translations.index');
    }

    public function render()
    {
        return view('livewire.translations.edit', [
            'languages' => LanguageService::getInstance()->getLanguages(),
        ])->layout('layouts.dashboard');
    }
}
