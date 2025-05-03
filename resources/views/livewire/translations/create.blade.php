<div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Yeni Çeviri Ekle</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('translations.index') }}">Çeviri Yönetimi</a></li>
                                    <li class="breadcrumb-item active">Yeni Çeviri Ekle</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Yeni Çeviri Ekle</h4>
                            </div>

                            <div class="card-body">
                                <form wire:submit.prevent="saveTranslation">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="group" class="form-label">Grup</label>
                                            <input type="text" class="form-control" id="group" wire:model="group" required>
                                            @error('group') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="key" class="form-label">Anahtar</label>
                                            <input type="text" class="form-control" id="key" wire:model="key" required>
                                            @error('key') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Çeviriler</label>
                                        <div class="row">
                                            @foreach($languages as $language)
                                            <div class="col-md-6 mb-2">
                                                <label class="form-label">{{ strtoupper($language->code) }}</label>
                                                <textarea type="text" class="form-control" wire:model="text.{{ $language->code }}" required></textarea>
                                                @error('text.' . $language->code) <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <a href="{{ route('translations.index') }}" class="btn btn-light">İptal</a>
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
</div>