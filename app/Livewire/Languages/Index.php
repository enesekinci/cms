<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $label = 'Dil Yönetimi';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function toggleStatus(Language $language): void
    {
        Log::info('toggleStatus');

        if ($language->is_default && $language->is_active) {
            $this->dispatch('error', [
                'message' => 'Varsayılan dili pasif hale getiremezsiniz.',
            ]);
            return;
        }

        $language->is_active = !$language->is_active;
        $language->save();

        $this->dispatch('success', [
            'message' => $language->is_active ? 'Dil aktif hale getirildi.' : 'Dil pasif hale getirildi.',
        ]);
    }

    public function setAsDefault(Language $language): void
    {
        Log::info('setAsDefault');

        if (!$language->is_active) {
            $this->dispatch('error', [
                'message' => 'Pasif bir dil varsayılan olarak ayarlanamaz.',
            ]);
            return;
        }

        Language::where('is_default', true)->update(['is_default' => false]);

        $language->is_default = true;
        $language->save();

        $this->dispatch('refresh');

        $this->dispatch('success', [
            'message' => 'Varsayılan dil başarıyla değiştirildi.',
        ]);
    }

    public function deleteLanguage(Language $language): void
    {
        if ($language->is_default) {
            $this->dispatch('error', [
                'message' => 'Varsayılan dil silinemez.',
            ]);
            return;
        }

        $language->delete();

        $this->dispatch('success', [
            'message' => 'Dil başarıyla silindi.',
        ]);
    }

    public function render()
    {
        $languages = Language::when($this->search, function ($query) {
            $query->where(function ($q) {
                $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
                  ->orWhereRaw('LOWER(code) LIKE ?', ['%' . strtolower($this->search) . '%']);
            });
        })->orderBy('id')->paginate(perPage: env('PAGINATION_PER_PAGE', 25));

        return view('livewire.languages.index', [
            'languages' => $languages,
        ])->layout('layouts.dashboard');
    }
}
