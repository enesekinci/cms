<?php

namespace App\Livewire\Languages;

use App\Models\Language;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{
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

        // $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.languages.index', [
            'languages' => Language::orderBy('id')->paginate(perPage: 25),
        ])->layout('layouts.dashboard');
    }
}
