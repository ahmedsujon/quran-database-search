<div>
    <style>
        .hadith-border-bottom {
            border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);
        }

        .arabic-results-table {
            --arabic-cell-min: 12rem;
        }

        .arabic-results-table .cell-word {
            min-width: 7rem;
            max-width: 14rem;
            word-wrap: break-word;
            overflow-wrap: anywhere;
        }

        .arabic-results-table .cell-verse {
            min-width: var(--arabic-cell-min);
            direction: rtl;
            text-align: right;
            font-size: clamp(1rem, 2.5vw, 1.15rem);
            line-height: 1.7;
            word-wrap: break-word;
            overflow-wrap: anywhere;
            hyphens: auto;
        }

        .actions-cell {
            min-width: 7rem;
            vertical-align: middle !important;
        }

        .actions-cell-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
        }

        .inference-badge {
            font-size: 0.7rem;
            padding: 2px 8px;
            border-radius: 12px;
            background: #e8f5e9;
            color: #2e7d32;
            font-weight: 600;
        }

        .actions-cell .btn {
            width: 100%;
            max-width: 120px;
            font-size: 0.8rem;
        }

        .actions-cell .btn-read {
            background: #008866;
            border: none;
            color: #fff;
        }

        .table-responsive.arabic-table-wrap {
            -webkit-overflow-scrolling: touch;
        }

        @media (max-width: 575.98px) {
            .arabic-results-breadcrumb {
                padding-left: 0.75rem !important;
                padding-right: 0.75rem !important;
                font-size: 0.9rem;
            }
        }
    </style>
    <div class="container mt-3 mt-md-4 px-2 px-sm-3">
        <nav aria-label="breadcrumb" class="mb-3 mb-md-4">
            <ol class="breadcrumb bg-light rounded shadow-sm px-3 py-2 arabic-results-breadcrumb flex-wrap">
                <li class="breadcrumb-item">
                    <a href="{{ route('app.ArabicConductSearch') }}" class="text-decoration-none text-primary">
                        <i class="bi bi-house-door-fill" aria-hidden="true"></i> Main Menu
                    </a>
                </li>
                @if (session('menu_name_arabic'))
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page" title="{{ session('menu_name_arabic') }}">
                        <a href="{{ url()->previous() }}" class="text-decoration-none" style="color: #008866">
                            {{ session('menu_name_arabic') }}
                        </a>
                    </li>
                @endif
                @if (session()->has('content_topic'))
                    <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page" title="{{ session('content_topic') }}">
                        {{ session('content_topic') }}
                    </li>
                @endif
            </ol>
        </nav>
        <div class="table-responsive arabic-table-wrap border rounded">
            <table class="table table-striped table-bordered mb-0 arabic-results-table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">الايات
                        </th>
                        <th class="text-center" scope="col">الاستنتاج اقرا الحديث
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($final_results->count() > 0)
                        @foreach ($final_results as $item)
                            <tr>
                                <td class="cell-verse" lang="ar">{{ $item->quran_arabic }}</td>
                                <td class="text-center actions-cell">
                                    <div class="actions-cell-inner">
                                        @if ($item->inferance_flag)
                                            <span class="inference-badge" title="The theme or subject was inferred based on the context of the current verse or from the theme of the previous or subsequent verses">الاستنتاج من خلال الاية
                                            </span>
                                        @endif
                                        @if ($this->reporting == 'Yes')
                                            <button type="button" class="btn btn-sm btn-read" wire:click.prevent='showAllHadiths({{ $item->w_id }})'>
                                                {!! loadingStateWithText(
                                                    'showAllHadiths(' . $item->w_id . ')',
                                                    'اقرا الحديث
                                                ',
                                                ) !!}
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3" class="text-center py-5">No exact data available!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav aria-label="Results pagination" class="mt-3 mt-md-4 overflow-x-auto">
            <div class="d-flex justify-content-center justify-content-md-start">
                {{ $final_results->links('livewire.app-pagination') }}
            </div>
        </nav>
    </div>

    <!-- Quran Arabic (reserved for showQuranArabic or future use) -->
    <div class="modal fade" id="showQuranArabicModal" tabindex="-1" role="dialog" aria-labelledby="quranArabicModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quranArabicModalTitle">Quran Arabic description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-12 text-start hadith-border-bottom pb-3">
                            <p class="mb-0" dir="rtl" lang="ar">{{ $quran_arabic }}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hadiths -->
    <div class="modal fade" id="showHadithsModal" tabindex="-1" role="dialog" aria-labelledby="hadithsModalTitle" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hadithsModalTitle">Hadith information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($hadiths)
                        @foreach ($hadiths as $hadith)
                            <div class="row mb-3">
                                <div class="col-12 text-start hadith-border-bottom pb-3">
                                    <p class="mb-0">{{ $hadith->hadith_english }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script>
        window.addEventListener('showQuranArabicModal', function() {
            var el = document.getElementById('showQuranArabicModal');
            if (el && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(el).show();
            }
        });

        window.addEventListener('showHadithsModal', function() {
            var el = document.getElementById('showHadithsModal');
            if (el && typeof bootstrap !== 'undefined') {
                bootstrap.Modal.getOrCreateInstance(el).show();
            }
        });
    </script>
@endpush
