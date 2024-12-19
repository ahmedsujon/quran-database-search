<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-12">
            <input type="text" class="form-control form-control-lg" id="searchQuery" placeholder="Search for a query..."
                aria-label="Search for a query" style="height: 40px;" wire:model.live="searchTerm"
                wire:keyup='resetPage' />
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
                        <button class="btn btn-info btn-sm" data-toggle="modal"
                            data-target="#modal-{{ $item->id }}">
                            Read
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modalLabel-{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel-{{ $item->id }}">Hadith Information
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $item->hadith_english }}
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

@push('scripts')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
