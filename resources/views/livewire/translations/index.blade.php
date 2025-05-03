<div>
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">{{ $label }}</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Panel</a></li>
                                    <li class="breadcrumb-item active">{{ $label }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">{{ $label }}</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex gap-2">
                                        <div class="search-box">
                                            <input type="text" class="form-control" placeholder="Grup, anahtar veya çeviri ara..." wire:model.live="search">
                                            <i class="ri-search-line search-icon"></i>
                                        </div>
                                        <a href="{{ route('translations.create') }}" class="btn btn-primary">
                                            <i class="ri-add-line align-bottom me-1"></i> Yeni Çeviri Ekle
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Grup</th>
                                                    <th scope="col">Anahtar</th>
                                                    <th scope="col">Çeviriler</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($translations as $translation)
                                                <tr>
                                                    <td><a onclick="return false;" href="#" class="fw-medium">#{{$translation->id}}</a></td>
                                                    <td>{{$translation->group}}</td>
                                                    <td>{{$translation->key}}</td>
                                                    <td>
                                                        @foreach($translation->text as $locale => $text)
                                                        <span class="badge bg-primary">{{ strtoupper($locale) }}: {{ $text }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <a href="{{ route('translations.edit', $translation->id) }}" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                            <a href="javascript:void(0)" class="link-danger fs-15" onclick="deleteConfirmation(() => $wire.deleteTranslation({{ $translation->id }}))"><i class="ri-delete-bin-line"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        {{ $translations->links('vendor.livewire.bootstrap') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Silme Onay Modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Onay</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bu çeviriyi silmek istediğinizden emin misiniz?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                    <button type="button" class="btn btn-danger" id="confirmDelete">Sil</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function deleteConfirmation(confirmCallback) {
            const modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            modal.show();

            document.getElementById('confirmDelete').onclick = function() {
                confirmCallback();
                modal.hide();
            };
        }
    </script>
    @endpush
</div>