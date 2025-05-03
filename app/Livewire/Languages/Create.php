<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $code;
    public $is_active = true;

    public function saveLanguage()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:2|unique:languages,code',
            'is_active' => 'boolean'
        ]);

        try {
            DB::beginTransaction();

            $language = Language::create([
                'name' => $this->name,
                'code' => $this->code,
                'is_active' => $this->is_active
            ]);

            // PostgreSQL için JSON güncelleme
            DB::table('translations')->update([
                'text' => DB::raw("text::jsonb || jsonb_build_object('" . $language->code . "', '')::jsonb"),
                'updated_at' => now()
            ]);

            DB::commit();

            $this->dispatch('success', ['message' => 'Dil başarıyla eklendi.']);
            return redirect()->route('languages.index');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('error', ['message' => 'Dil eklenirken bir hata oluştu.']);
        }
    }

    public function render()
    {
        return view('livewire.languages.create')->layout('layouts.dashboard');
    }
}
