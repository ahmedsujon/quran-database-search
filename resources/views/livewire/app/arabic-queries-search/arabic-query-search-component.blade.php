<div class="query-search-page" dir="rtl">
    <style>
        .query-search-page {
            --query-accent: var(--green, #0b8a6a);
            --query-accent-hover: #008866;
        }

        .query-search-page .breadcrumb-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);
        }

        .query-search-page .breadcrumb {
            margin-bottom: 0;
            background: transparent;
            padding: 0;
        }

        .query-search-page .breadcrumb-item a {
            color: var(--query-accent-hover);
            font-weight: 500;
        }

        .query-search-page .breadcrumb-item a:hover {
            color: var(--query-accent);
        }

        .query-search-page .query-list-card {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .query-search-page .query-list-card .card-header {
            border-top: 3px solid var(--query-accent);
        }

        .query-search-page .query-list-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.9rem 1.25rem;
            border-left: 3px solid transparent;
            transition: background-color 0.15s ease, border-left-color 0.15s ease;
            color: #0f172a;
            text-decoration: none;
            cursor: pointer;
        }

        .query-search-page .query-list-item:hover {
            background: #f8fafc;
            border-left-color: var(--query-accent-hover);
            color: #0f172a;
        }

        .query-search-page .query-list-item:focus {
            outline: 2px solid rgba(11, 138, 106, 0.35);
            outline-offset: -2px;
        }

        .query-search-page .query-list-index {
            flex-shrink: 0;
            width: 2rem;
            height: 2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--query-accent-hover);
            background: #ecfdf5;
            border-radius: 6px;
        }

        .query-search-page .query-list-text {
            flex: 1;
            text-align: start;
            line-height: 1.45;
        }

        .query-search-page .query-list-chevron {
            flex-shrink: 0;
            color: #9ca3af;
            font-size: 1.1rem;
            transition: transform 0.15s ease, color 0.15s ease;
        }

        .query-search-page[dir="rtl"] .query-list-item:hover .query-list-chevron {
            color: var(--query-accent-hover);
            transform: translateX(-3px);
        }

        .query-search-page .btn-back-home {
            background-color: #008866;
            border: none;
            color: #fff;
        }

        .query-search-page .btn-back-home:hover {
            background-color: #006b52;
            color: #fff;
        }

        .query-search-page .empty-state {
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--muted, #6b7280);
            background: #fafafa;
            border-radius: 8px;
            border: 1px dashed #e5e7eb;
        }
    </style>

    <div class="container mt-4" style="margin-top: 70px !important;">
        <div class="row mb-3 align-items-start">
            <div class="col-12 col-lg-8 mb-3 mb-lg-0">
                <h4 class="mb-1 text-center text-lg-start fw-semibold">اختر استعلاماً جاهزاً</h4>
                @if (session('menu_name_arabic'))
                    <p class="text-muted small mb-0 text-center text-lg-start">{{ session('menu_name_arabic') }}</p>
                @endif
            </div>
            <div class="col-12 col-lg-4 text-center text-lg-end">
                <a href="{{ route('app.ArabicConductSearch') }}" class="btn btn-outline-secondary btn-sm ms-2 mb-2 mb-sm-0">
                    القائمة الرئيسية
                </a>
                <a href="{{ route('app.home') }}" class="btn btn-secondary btn-sm btn-back-home">
                    Back To Home
                </a>
            </div>
        </div>

        <nav aria-label="breadcrumb" class="mb-4">
            <div class="breadcrumb-card px-4 py-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('app.ArabicConductSearch') }}" class="text-decoration-none">
                            <span aria-hidden="true">⌂</span> القائمة الرئيسية
                        </a>
                    </li>
                    @if (session('menu_name_arabic'))
                        <li class="breadcrumb-item active text-dark fw-semibold" aria-current="page" title="{{ session('menu_name_arabic') }}">
                            {{ session('menu_name_arabic') }}
                        </li>
                    @endif
                </ol>
            </div>
        </nav>

        <div class="card query-list-card border-0">
            <div class="card-header bg-white py-3 d-flex flex-wrap align-items-center justify-content-between gap-2">
                <span class="fw-semibold text-dark">اسم الاستعلام</span>
                <span class="badge rounded-pill bg-light text-secondary border">
                    {{ $searchValues->count() }}
                    {{ $searchValues->count() === 1 ? 'استعلام' : 'استعلامات' }}
                </span>
            </div>
            @if ($searchValues->isEmpty())
                <div class="card-body empty-state mb-0">
                    لا توجد استعلامات لهذه القائمة بعد.
                </div>
            @else
                <div class="list-group list-group-flush">
                    @foreach ($searchValues as $item)
                        <a href="javascript:void(0)" wire:click.prevent="showData({{ $item->id }})" class="list-group-item list-group-item-action query-list-item border-start-0 border-end-0" role="button">
                            <span class="query-list-index">{{ $loop->iteration }}</span>
                            <span class="query-list-text">{{ $item->topic_arabic }}</span>
                            <span class="query-list-chevron" aria-hidden="true">‹</span>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
