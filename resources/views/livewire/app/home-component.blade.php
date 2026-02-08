<div>
    <style>
        .home-hero-section {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 20px;
            background: #fafafa;
        }

        .home-hero-section .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-options-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 32px;
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }

        .search-card {
            background: #ffffff;
            border-radius: 8px;
            padding: 48px 32px;
            text-align: center;
            border: 1px solid #e5e7eb;
            transition: border-color 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .search-card:hover {
            border-color: #d1d5db;
        }

        .english-card {
            border-top: 3px solid #2563eb;
        }

        .arabic-card {
            border-top: 3px solid #008866;
        }

        .search-icon {
            font-size: 48px;
            margin-bottom: 24px;
            display: block;
        }

        .search-button {
            display: inline-block;
            text-decoration: none;
            padding: 12px 32px;
            font-size: 16px;
            font-weight: 500;
            border-radius: 6px;
            transition: opacity 0.2s ease;
            margin-top: 24px;
        }

        .search-button:hover {
            opacity: 0.9;
            text-decoration: none;
        }

        .english-button {
            background: #2563eb;
            color: white;
        }

        .arabic-button {
            background: #008866;
            color: white;
        }

        .card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #111827;
        }

        .card-description {
            font-size: 15px;
            color: #6b7280;
            line-height: 1.5;
        }

        @media (max-width: 768px) {
            .home-hero-section {
                padding: 60px 20px;
            }

            .search-options-container {
                grid-template-columns: 1fr;
                gap: 24px;
                max-width: 100%;
            }

            .search-card {
                padding: 40px 24px;
            }

            .card-title {
                font-size: 22px;
            }
        }

        @media (max-width: 640px) {
            .search-options-container {
                max-width: 100%;
            }
        }
    </style>
    <section class="home-hero-section">
        <div class="container">
            <div class="search-options-container">
                <div class="search-card english-card">
                    <span class="search-icon">🔍</span>
                    <h2 class="card-title">English Search</h2>
                    <p class="card-description">Search the Quran in English</p>
                    <a href="{{ route('app.english-version') }}" class="search-button english-button">
                        Start Searching
                    </a>
                </div>
                <div class="search-card arabic-card">
                    <span class="search-icon">📖</span>
                    <h2 class="card-title">Arabic Search</h2>
                    <p class="card-description">Search the Quran in Arabic</p>
                    <a href="{{ route('app.arabic-version') }}" class="search-button arabic-button">
                        Start Searching
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
