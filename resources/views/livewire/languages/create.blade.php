<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Dil Ekle</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('languages.index') }}">Dil Yönetimi</a></li>
                                <li class="breadcrumb-item active">Yeni Dil Ekle</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Yeni Dil Ekle</h4>
                        </div>
                        <div class="card-body">
                            <form wire:submit.prevent="saveLanguage">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Dil Adı</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" wire:model="name" required>
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kısa Kod</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" wire:model="code" required>
                                    @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="is_active" wire:model="is_active">
                                        <label class="form-check-label" for="is_active">Aktif</label>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="{{ route('languages.index') }}" class="btn btn-light">İptal</a>
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 