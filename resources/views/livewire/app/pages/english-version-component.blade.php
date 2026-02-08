<div>
    <style>
        .page-section {
            padding: 80px 20px;
            background: #fafafa;
            min-height: calc(100vh - 200px);
        }

        .page-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .content-card {
            background: #ffffff;
            border-radius: 12px;
            padding: 48px 40px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 32px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 24px;
            line-height: 1.3;
        }

        .section-title {
            font-size: 22px;
            font-weight: 600;
            color: #111827;
            margin-top: 40px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f3f4f6;
        }

        .intro-text {
            font-size: 16px;
            line-height: 1.7;
            color: #4b5563;
            margin-bottom: 24px;
        }

        .intro-text p {
            margin-bottom: 20px;
        }

        .intro-text ul {
            margin: 20px 0;
            padding-left: 24px;
        }

        .intro-text li {
            margin-bottom: 12px;
            line-height: 1.7;
            color: #4b5563;
        }

        .intro-text li ul {
            margin-top: 8px;
            margin-bottom: 8px;
        }

        .intro-text a {
            color: #2563eb;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .intro-text a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }

        .intro-text strong {
            color: #111827;
            font-weight: 600;
        }

        .search-button-container {
            text-align: center;
            margin-top: 48px;
            padding-top: 40px;
            border-top: 1px solid #e5e7eb;
        }

        .start-search-button {
            display: inline-block;
            text-decoration: none;
            padding: 14px 40px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .start-search-button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            color: white;
        }

        @media (max-width: 768px) {
            .page-section {
                padding: 40px 16px;
            }

            .content-card {
                padding: 32px 24px;
            }

            .page-title {
                font-size: 26px;
            }

            .section-title {
                font-size: 20px;
            }

            .intro-text {
                font-size: 15px;
            }
        }
    </style>
    <section class="page-section">
        <div class="content-card">
            <h1 class="page-title">Welcome to Know Your Quran</h1>

            <div class="intro-text">
                <p>Know Your Quran is a unique search engine and tool to help you better understand the Quran and its many themes. Know Your Quran helps do this through:</p>

                <ul>
                    <li>Comprehensive search of English words, surfacing the context surrounding the verse as well as connected themes / narratives</li>
                    <li>Over 570 pre-built queries that help bring a connected perspective throughout the entirety of the Quran</li>
                    <li>Further contextualization through the inclusion of relevant hadith, offering a holistic viewpoint and understanding of specific verses and terms</li>
                </ul>

                <p>Know Your Quran is different than other search tools because its 500 plus pre-built queries were handcrafted after careful examination/review of the Quran and Hadith, surfacing themes that are impossible to search for in a standard manner (e.g., Whom Allah loves, How to Receive Allah's Mercy, etc.)</p>

                <p>Know Your Quran was created solely out of love and deference to our Lord and Creator. As we are simply human, we ask forgiveness for any mistakes that may be present in this database, despite thorough efforts to review. If you have any corrections, please email us at <strong><a href="mailto:Admin@knowyourquran.com">Admin@knowyourquran.com</a></strong>.</p>

                <h3 class="section-title">Search Capabilities and Key Nuances</h3>

                <ul>
                    <li>Please note that the following translations were used for some specific words that is used throughout the Quran: Zalemoon = Wrong Doers; Muttaqeen = God Conscious, God Fearing, Mujremeen = Criminal, Sinners; Fasad = Corruption Spreader, Mischief Makers; Faseqeen = Troublemaker, Disobedient, Rebel, Wicked, Etc.</li>

                    <li>The search provides an explanation and interpretation of each word used in the Quran. In many cases the explanation includes the contents of the previous verse or the subsequent verse, as they are related to the same subject.</li>

                    <li>The Search provides capability of Inferring words, i.e., it will display verse 2:2 when you search for the word "Quran" even though verse 2:2 does not have the word Quran. Similarly, it will infer and display words or subjects that are directly not mentioned in the verse but are connected, and or related to words or subjects discussed in the previous or later verses</li>

                    <li>The database has been built, to the extent possible, to recognize synonymous words, or names, i.e., the Arabic word "Ureed" is often translated into desire, intend, want, or wish, and the search will recognize it.</li>

                    <li>While the search engine provides the capability of doing individual search on theme or subject, we have included Over 570 hundreds of curated searches</li>

                    <li>Associated hadiths from the Sahih Sittah deemed Sahih or Hasan and related to the Quran topic is also provided. Please remember that the hadith list is not comprehensive, and it only lists key hadiths. Please consult Ulema for any questions.</li>

                    <li>If you wish to contribute, report an error on the search, or make any comments, please send your request to <a href="mailto:Knowyourquran@gmail.com">Knowyourquran@gmail.com</a>.
                        <ul>
                            <li>If you want to see a new canned search included, please mention the topic, and if you know the associated Quran verses or hadith, please list them and sent it to the email</li>
                            <li>If you see any error or correction that needs to be done, please identify them and sent it to the email</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="search-button-container">
                <a href="{{ route('app.ConductSearch') }}" class="start-search-button">
                    Conduct Quran Search
                </a>
            </div>
        </div>
    </section>
</div>
