<?php

namespace App\Livewire\Translations;

use App\Models\Translation;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $label = 'Çeviri Yönetimi';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteTranslation($id)
    {
        $translation = Translation::findOrFail($id);
        $translation->delete();

        $this->dispatch('success', ['message' => 'Çeviri başarıyla silindi.']);
    }

    public function render()
    {
        $translations = Translation::when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->whereRaw('LOWER(group) LIKE ?', ['%' . strtolower($this->search) . '%'])
                  ->orWhereRaw('LOWER(key) LIKE ?', ['%' . strtolower($this->search) . '%'])
                  ->orWhereRaw('LOWER(text::text) LIKE ?', ['%' . strtolower($this->search) . '%']);
            });
        })->orderBy('id')->paginate(perPage: env('PAGINATION_PER_PAGE', 25));

        return view('livewire.translations.index', [
            'translations' => $translations,
        ])->layout('layouts.dashboard');
    }
}
