<div>
    <div class="container mt-4">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light rounded shadow-sm px-4 py-3">
                <li class="breadcrumb-item">
                    <a href="{{ route('app.QuerySearchMenu') }}" class="text-decoration-none text-primary">
                        <i class="bi bi-house-door-fill"></i> Main Menu
                    </a>
                </li>
                @if (session('menu_name'))
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page"
                        title="{{ session('menu_name') }}">
                        <a href="{{ url()->previous() }}" style="text-decoration: none;">
                            {{ session('menu_name') }}
                        </a>
                    </li>
                @endif
                @if (session()->has('content_topic'))
                    <li class="breadcrumb-item active text-dark fw-semibold " aria-current="page"
                        title="{{ session('content_topic') }}">
                        {{ session('content_topic') }}
                    </li>
                @endif
            </ol>
        </nav>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Word Or Category</th>
                    <th scope="col">Summary Description</th>
                    @if ($checkbox_one)
                        <th scope="col">Verse Description</th>
                    @endif
                    <th scope="col">Inference Flag</th>
                    @if ($checkbox_two)
                        <th scope="col">Associated Hadith</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($final_results as $item)
                    <tr>
                        <td scope="row" style="width: 10%;">{{ $item->word_topic }}</td>
                        @if ($checkbox_two)
                            <td style="width: 30%;">{{ $item->ayat_summary_des }}</td>
                        @endif
                        @if ($checkbox_one)
                            <td style="width: 50%;">{{ $item->quran_english }}</td>
                        @endif
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
                                            <h5 class="modal-title" id="modalLabel">Hadith
                                                Information</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($hadiths)
                                                @foreach ($hadiths as $hadith)
                                                    <div class="row mb-3">
                                                        <div class="col-md-12 text-start">
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
            {{ $final_results->links('livewire.app-pagination') }}
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
