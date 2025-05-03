<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Livewire\Component;

class Edit extends Component
{
    public $id;
    public $name;
    public $code;
    public $is_active;

    public function mount(Language $language)
    {
        $this->id = $language->id;
        $this->name = $language->name;
        $this->code = $language->code;
        $this->is_active = $language->is_active;
    }

    public function updateLanguage()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:2|unique:languages,code,' . $this->id,
            'is_active' => 'boolean'
        ]);

        Language::where('id', $this->id)->update([
            'name' => $this->name,
            'code' => $this->code,
            'is_active' => $this->is_active
        ]);

        $this->dispatch('success', ['message' => 'Dil başarıyla güncellendi.']);

        return redirect()->route('languages.index');
    }

    public function render()
    {
        return view('livewire.languages.edit')->layout('layouts.dashboard');
    }
}
