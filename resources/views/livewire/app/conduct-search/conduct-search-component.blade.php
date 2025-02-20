<div>
    <style>
        .hadith-border-bottom {
            border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);
        }

        .hadith-btn-style {
            background: #008866;
            border: none;
            color: #fff;
        }
    </style>

    <div class="container-fluid mt-4" style="margin-top: 70px !important;">
        <div class="row">
            <!-- Left Column: Main Menu (Scrollable) -->
            <div class="col-12 col-md-3 mb-3" style="max-height: 120vh; overflow-y: auto;">
                <!-- Fixed Title at the top of the left column -->
                <h4 class="mb-3 text-center" style="position: sticky; top: 0; background-color: #fff; z-index: 10; padding-top: 10px;">
                    Select Any of the Following Canned Queries
                </h4>

                <!-- Menu Items -->
                @foreach ($main_menus as $item)
                    <div class="menu-card mb-2">
                        <a href="{{ route('app.QuerySearch', ['id' => $item->id, 'menu_name' => $item->menu_name]) }}" class="text-decoration-none">
                            <div class="btn btn-outline-success d-flex flex-column justify-content-between text-start py-3" style="min-height: 150px;">
                                <small>{{ $item->menu_name }}</small>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Right Column: Results and Search Bar -->
            <div class="col-12 col-md-9">
                <!-- Back to Home Button and Title -->
                <div class="row mb-3">
                    <div class="col-12 col-md-10 mb-2 mb-md-0">
                        <h4 class="text-center text-md-start">Explore Quranic Verses and Insights - Search by Theme, Subject or Topic</h4>
                    </div>
                    <div class="col-12 col-md-2 text-center text-md-end">
                        <a href="{{ route('app.home') }}" class="btn btn-secondary btn-sm" style="background-color: #008866;">Back To Home</a>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="row justify-content-center">
                    <div class="col-12">
                        <input type="text" class="form-control form-control-lg shadow-sm border-2 rounded-pill px-4" id="searchQuery" placeholder="Search for a query..." aria-label="Search for a query" style="height: 40px;" wire:model.live="searchTerm" wire:keyup='resetPage' autofocus />
                    </div>
                </div>

                <!-- Loading State -->
                <div class="row">
                    <div class="col-12 text-center">
                        <div style="position: absolute; text-align: center;" wire:loading wire:target='searchTerm,previousPage,gotoPage,nextPage'>
                            <span class="bg-light" style="padding: 5px 15px; border-radius: 2px;">
                                <span class="spinner-border spinner-border-xs align-middle" role="status" aria-hidden:true></span>
                                Searching...
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mt-5">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" scope="col" style="width: 10%;">Theme, Subject or Topic</th>
                                <th scope="col" style="width: 30%;">Summary Description</th>
                                <th scope="col" style="width: 45%;">Verse Description</th>
                                <th class="text-center" scope="col" style="width: 10%;">Inference Flag</th>
                                <th class="text-center" scope="col" style="width: 5%;">Hadith Reference</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($querySearchResults as $item)
                                <tr>
                                    <td scope="row" style="width: 15%;">{{ $item->word_topic }}</td>
                                    <td style="width: 30%;">{{ $item->ayat_summary_des }}</td>
                                    <td style="width: 45%;">{{ $item->quran_english }}</td>
                                    <td style="width: 10%;">{{ $item->inferance_flag }}</td>
                                    <td style="width: 10%;" class="text-center">
                                        <button class="btn btn-info btn-sm hadith-btn-style" wire:click.prevent='showAllHadiths({{ $item->w_id }})'>
                                            {!! loadingStateWithText('showAllHadiths(' . $item->w_id . ')', 'Read') !!}
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page navigation example" class="mt-4">
                    {{ $querySearchResults->links('livewire.app-pagination') }}
                </nav>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="showHadithsModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Hadith Information
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($hadiths)
                        @foreach ($hadiths as $hadith)
                            <div class="row mb-3">
                                <div class="col-md-12 text-start hadith-border-bottom" style="border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);">
                                    <p>{{ $hadith->hadith_english }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
