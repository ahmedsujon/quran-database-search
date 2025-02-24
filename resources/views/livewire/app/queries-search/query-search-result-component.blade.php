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
    <div class="container mt-4" wire:ignore>
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb bg-light rounded shadow-sm px-4 py-3">
                <li class="breadcrumb-item">
                    <a href="{{ route('app.ConductSearch') }}" class="text-decoration-none text-primary">
                        <i class="bi bi-house-door-fill"></i> Main Menu
                    </a>
                </li>
                @if (session('menu_name'))
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page" title="{{ session('menu_name') }}">
                        <a href="{{ url()->previous() }}" style="text-decoration: none; color: #008866">
                            {{ session('menu_name') }}
                        </a>
                    </li>
                @endif
                @if (session()->has('content_topic'))
                    <li class="breadcrumb-item active text-dark fw-semibold " aria-current="page" title="{{ session('content_topic') }}">
                        {{ session('content_topic') }}
                    </li>
                @endif
            </ol>
        </nav>

        <table class="table table-striped table-bordered mt-5">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center" scope="col" style="width: 10%;">Word Or Category</th>
                    <th scope="col" style="width: 30%;">Summary Description</th>
                    <th scope="col" style="width: 40%;">Verse Description</th>
                    <th class="text-center" scope="col" style="width: 10%;">Inference Flag</th>
                    <th class="text-center" scope="col" style="width: 5%;">Arabic Description</th>
                    <th class="text-center" scope="col" style="width: 5%;">Hadith Reference</th>
                </tr>
            </thead>
            <tbody>
                @if ($final_results->count() > 0)
                    @php
                        $sl = $final_results->perPage() * $final_results->currentPage() - ($final_results->perPage() - 1);
                    @endphp
                    @foreach ($final_results as $item)
                        <tr>
                            <td scope="row" style="width: 10%;">{{ $item->word_topic }}</td>
                            <td style="width: 30%;">{{ $item->ayat_summary_des }}</td>
                            <td style="width: 50%;">{{ $item->quran_english }}</td>
                            <td style="width: 10%;">{{ $item->inferance_flag }}</td>
                            <td style="width: 10%;" class="text-center">
                                <button class="btn btn-info btn-sm hadith-btn-style" wire:click.prevent="showQuranArabic({{ $item->w_id }})">
                                    {!! loadingStateWithText('showQuranArabic(' . $item->w_id . ')', 'Display Arabic') !!}
                                </button>
                            </td>
                            <td style="width: 10%;" class="text-center">
                                <button class="btn btn-info btn-sm hadith-btn-style" wire:click.prevent='showAllHadiths({{ $item->w_id }})'>
                                    {!! loadingStateWithText('showAllHadiths(' . $item->w_id . ')', 'Read') !!}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7" class="text-center pt-5 pb-5">No exact data available!</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            {{ $final_results->links('livewire.app-pagination') }}
        </nav>
    </div>

    <!-- Read Arabic Description -->
    <div class="modal fade" id="showQuranArabicModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Quran Arabic Description</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-12 text-start hadith-border-bottom" style="border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);">
                            <p>{{ $quran_arabic }}</p> <!-- Show Quran Arabic Text Dynamically -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('showQuranArabicModal', () => {
                $('#showQuranArabicModal').modal('show');
            });
        });
    </script>
@endpush
