<div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Çeviriyi Düzenle</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('translations.index') }}">Çeviri Yönetimi</a></li>
                                    <li class="breadcrumb-item active">Çeviriyi Düzenle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Çeviriyi Düzenle</h4>
                            </div>

                            <div class="card-body">
                                <form wire:submit.prevent="updateTranslation">
                                    <input type="hidden" wire:model="edit_id">
                                    <div class="mb-3">
                                        <label for="edit_group" class="form-label">Grup</label>
                                        <input type="text" class="form-control" id="edit_group" wire:model="edit_group" required>
                                        @error('edit_group') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_key" class="form-label">Anahtar</label>
                                        <input type="text" class="form-control" id="edit_key" wire:model="edit_key" required>
                                        @error('edit_key') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="edit_text" class="form-label">Çeviriler</label>
                                        <div class="row">
                                            @foreach($languages as $language)
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">{{ strtoupper($language->code) }}</label>
                                                <textarea type="text" class="form-control" wire:model="edit_text.{{ $language->code }}" required></textarea>
                                                @error('edit_text.' . $language->code) <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('translations.index') }}" class="btn btn-light">İptal</a>
                                        <button type="submit" class="btn btn-primary">Güncelle</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 