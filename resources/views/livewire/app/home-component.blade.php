<div>
    <style>
        .search-button-container {
            text-align: center;
            margin: 20px 0;
        }

        .start-search-button {
            display: inline-block;
            text-decoration: none;
            padding: 10px 20px;
            margin: 10px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .start-search-button:hover {
            color: #f8f9fa;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .separator-text {
            margin: 15px 0;
            color: #6c757d;
            font-style: italic;
        }
    </style>
    <section>
        <div class="container">
            <div class="intro-text">
                <h2>Welcome to Know Your Quran - A Unique Search Engine</h2>
                <p>Know Your Quran is a unique search engine and tool to help you better understand the Quran and its many
                    themes. Know Your Quran helps do this through:</p>
                <ul>
                    <li>Comprehensive search of English words, surfacing the context surrounding the verse as well as
                        connected themes / narratives</li>
                    <li>Over 500 pre-built queries that help bring a connected perspective throughout the entirety of the
                        Quran</li>
                    <li>Further contextualization through the inclusion of relevant hadith, offering a holistic viewpoint and
                        understanding of specific verses and terms</li>
                </ul>
                <p>Know Your Quran is different than other search tools because its 500 plus pre-built queries were handcrafted
                    after careful examination/review of the Quran and Hadith, surfacing themes that are impossible to search for in
                    a standard manner (e.g., Whom Allah loves, How to Receive Allah’s Mercy, etc.)</p>
                <p>Know Your Quran was created solely out of love and deference to our Lord and Creator. As we are simply
                    human, we ask forgiveness for any mistakes that may be present in this database, despite thorough efforts to
                    review. If you have any corrections, please email us at
                    <strong> <a href="mailto:Admin@knowyourquran.com">Admin@knowyourquran.com</a></strong>.
                </p>
                <h3>Search capabilities and key nuances</h3>
                <ul>
                    <li>Please note that the following translations were used for some specific words that is used throughout the Quran:
                        Zalemoon = Wrong Doers; Muttaqeen = God Conscious, God Fearing, Mujremeen = Criminal, Sinners; Fasad =
                        Corruption Spreader, Mischief Makers; Faseqeen = Troublemaker, Disobedient, Rebel, Wicked, Etc.</li>

                    <li>The search provides an explanation and interpretation of each word used in the Quran. In many cases the
                        explanation includes the contents of the previous verse or the subsequent verse, as they are related to the
                        same subject.</li>
                    <li>The Search provides capability of Inferring words, i.e., it will display verse 2:2 when you search for the word
                        “Quran” even though verse 2:2 does not have the word Quran. Similarly, it will infer and display words or
                        subjects that are directly not mentioned in the verse but are connected, and or related to words or subjects
                        discussed in the previous or later verses</li>
                    <li>The database has been built, to the extent possible, to recognize synonymous words, or names, i.e., the Arabic
                        word “Ureed” is often translated into desire, intend, want, or wish, and the search will recognize it.</li>
                    <li>While the search engine provides the capability of doing individual search on theme or subject, we have
                        included over 500 hundreds of curated searches</li>
                    <li>Associated hadiths from the Sahih Sittah deemed Sahih or Hasan and related to the Quran topic is also
                        provided. Please remember that the hadith list is not comprehensive, and it only lists key hadiths. Please
                        consult Ulema for any questions.</li>
                    <li>If you wish to contribute, report an error on the search, or make any comments, please send your request to <a href="mailto:Knowyourquran@gmail.com">Knowyourquran@gmail.com</a>.
                        <ul>
                            <li>If you want to see a new canned search included, please mention the topic, and if you
                                know the
                                associated Quran verses or hadith, please list them and sent it to the email</li>
                            <li>If you see any error or correction that needs to be done, please identify them and sent
                                it to the email</li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="search-capabilities">
                <div class="search-button-container">
                    <a href="{{ route('app.ConductSearch') }}" class="start-search-button">
                        Conduct Quran Search
                    </a>
                    {{-- <h5 class="separator-text">OR</h5>
                    <a href="{{ route('app.QuerySearchMenu') }}" class="start-search-button">
                        Select from Any of the Following Canned Queries
                    </a> --}}
                </div>
            </div>
        </div>
    </section>
</div>
