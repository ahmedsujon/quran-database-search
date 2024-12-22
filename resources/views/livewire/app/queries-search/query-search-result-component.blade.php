<div>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Word Or Category</th>
                    <th scope="col">Summary Description</th>
                    <th scope="col">Verse Description</th>
                    <th scope="col">Inference Flag</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($final_results as $item)
                    <tr>
                        <td scope="row" style="width: 10%;">{{ $item->word_topic }}</td>
                        <td style="width: 30%;">{{ $item->ayat_summary_des }}</td>
                        <td style="width: 50%;">{{ $item->quran_english }}</td>
                        <td style="width: 10%;">{{ $item->inferance_flag }}</td>
                        <td style="width: 10%;" class="text-center">
                            {{-- <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#modal-{{ $item->id }}">
                                Read
                            </button> --}}

                            <button class="btn btn-info btn-sm" data-toggle="modal"
                                data-target="#modal-{{ $item->id }}">
                                Read
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modal-{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modalLabel-{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalLabel-{{ $item->id }}">Hadith
                                                Information</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
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
            {{ $final_results->links('livewire.app-pagination') }}
        </nav>
    </div>
</div>
@push('scripts')
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endpush
