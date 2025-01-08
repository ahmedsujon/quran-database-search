<div>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Hadith Import</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                        <li class="breadcrumb-item active">Hadith Import</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8 offset-2 mt-5">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Hadith Data Import</h4>
            </div>

            <div class="card-body">
                <form wire:submit.prevent='uploaHadithExcel'>
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password" class="form-label">Hadith Data CSV</label>
                                <input type="file" wire:model='excel' class="form-control">
                                @error('excel')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <!-- Progress Bar -->
                                <div wire:loading wire:target="excel" class="mt-2">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated"
                                            role="progressbar" style="width: 100%; height: 20px; padding: 150px;">
                                            Uploading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer mt-2">
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="excel">
                            {!! loadingStateWithText('uploaHadithExcel', 'Submit') !!}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('closeModal', event => {
            $('#myModal').modal('hide');
        });

        window.addEventListener('adminDeleted', event => {
            Swal.fire({
                title: "Deleted!",
                text: "Your file has been deleted.",
                icon: "success",
                confirmButtonClass: "btn btn-primary w-xs mt-2",
                buttonsStyling: !1,
            });
        });
    </script>
@endpush
