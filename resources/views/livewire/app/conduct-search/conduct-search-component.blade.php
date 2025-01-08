<div>
    <style>
        .hadith-border-bottom {
            border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);
        }
    </style>
    <div class="container mt-4">
        <h4 class="mb-3 text-center">Explore Quranic Verses and Insights - Search by Words, Categories, or Topics</h4>
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-12 col-lg-12">
                <input type="text" class="form-control form-control-lg shadow-sm border-2 rounded-pill px-4"
                    id="searchQuery" placeholder="Search for a query..." aria-label="Search for a query"
                    style="height: 50px;" wire:model.live="searchTerm" wire:keyup='resetPage' autofocus />
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center;">
                <div style="position: absolute; text-align: center;" wire:loading
                    wire:target='searchTerm,previousPage,gotoPage,nextPage'>
                    <span class="bg-light" style="padding: 5px 15px; border-radius: 2px;"><span
                            class="spinner-border spinner-border-xs align-middle" role="status"
                            aria-hidden="true"></span>
                        Searching...</span>
                </div>
            </div>
        </div>
        <!-- Table -->
        <table class="table table-striped table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" style="width: 10%;">Word Or Category</th>
                    <th scope="col" style="width: 30%;">Summary Description</th>
                    <th scope="col" style="width: 45%;">Verse Description</th>
                    <th class="text-center" scope="col" style="width: 10%;">Inference Flag</th>
                    <th class="text-center" scope="col" style="width: 5%;">Hadith Reference</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($querySearchResults as $item)
                    <tr>
                        <td scope="row" style="width: 10%;">{{ $item->word_topic }}</td>
                        <td style="width: 30%;">{{ $item->ayat_summary_des }}</td>
                        <td style="width: 50%;">{{ $item->quran_english }}</td>
                        <td style="width: 10%;">{{ $item->inferance_flag }}</td>
                        <td style="width: 10%;" class="text-center">
                            <button class="btn btn-info btn-sm"
                                wire:click.prevent='showAllHadiths("{{ $item->word_topic }}")'>
                                Read
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="showHadithsModal" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel">Hadith Information
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($hadiths)
                                                @foreach ($hadiths as $hadith)
                                                    <div class="row mb-3">
                                                        <div class="col-md-12 text-start hadith-border-bottom"
                                                            style="border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);">
                                                            <p>{{ $hadith->hadith_english }}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            {{ $querySearchResults->links('livewire.app-pagination') }}
        </nav>
    </div>
</div>

@push('scripts')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('showHadithsModal', event => {
            $('#showHadithsModal').modal('show');
        });
    </script>
@endpush
