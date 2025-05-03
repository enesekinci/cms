<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Basic Tables</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Basic Tables</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Responsive Tables</h4>
                            <div class="flex-shrink-0">
                                <!-- yeni ekleme butonu -->
                                <a href="javascript:void(0);" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#addModal"><i class="ri-add-line me-1"></i> Yeni Ekle</a>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <p class="text-muted">Use <code>table-responsive</code> class to make any table responsive across all viewports. Responsive tables allow tables to be scrolled horizontally with ease.</p>
                            <div class="live-preview">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Dil</th>
                                                <th scope="col">Kısa Kod</th>
                                                <th scope="col">Durum</th>
                                                <th scope="col">Varsayılan</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($languages as $language)
                                            <tr>
                                                <td><a onclick="return false;" href="#" class="fw-medium">#{{$language->id}}</a></td>
                                                <td>{{$language->name}}</td>
                                                <td>{{str($language->code)->upper()}}</td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            {{ $language->is_default ? 'disabled' : '' }}
                                                            wire:click="toggleStatus({{ $language->id }})"
                                                            id="statusCheck{{ $language->id }}"
                                                            {{ $language->is_active ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="statusCheck{{ $language->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox"
                                                            wire:click="setAsDefault({{ $language->id }})"
                                                            id="defaultCheck{{ $language->id }}"
                                                            {{ $language->is_default ? 'checked' : '' }}
                                                            {{ $language->is_active ? '' : 'disabled' }}>
                                                        <label class="form-check-label" for="defaultCheck{{ $language->id }}"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <a href="javascript:void(0);" class="link-success fs-15"><i class="ri-edit-2-line"></i></a>
                                                        <a href="javascript:void(0);" class="link-danger fs-15" onclick="deleteConfirmation(function() {
                                                        @this.deleteLanguage({{ $language->id }});
                                                        })"><i class="ri-delete-bin-line"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- end table -->
                                </div>
                                <!-- end table responsive -->
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © CMS.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Enes EKINCI
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>