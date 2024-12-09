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
                <h2>Welcome to Know Your Quran</h2>
                <p>Know Your Quran is a unique search engine and tool designed to help you better understand the Quran
                    and its many themes. The platform offers:</p>
                <ul>
                    <li>A comprehensive search of English words, with surrounding verse context and connected
                        themes/narratives.</li>
                    <li>Pre-built queries to bring a connected perspective throughout the Quran.</li>
                    <li>Contextualization through relevant hadith to provide a holistic understanding of specific verses
                        and terms.</li>
                </ul>
                <p>Unlike other search tools, Know Your Quran's pre-built queries are crafted after careful examination
                    of the Quran and Hadith, surfacing themes that are difficult to search for in a standard manner
                    (e.g., "the ones who Allah loves").</p>
                <p>The database has been built with deep reverence and love for our Creator. We strive to provide
                    accurate information, but if you notice any mistakes, we humbly request your feedback at
                    <strong> <a href="mailto:Knowyourquran@gmail.com">Knowyourquran@gmail.com</a></strong>.
                </p>
                <h3>Search Capabilities and Key Nuances</h3>
                <ul>
                    <li>Please note that Translations used for specific words include: <strong>Zalemoon</strong> (Wrong
                        Doers), <strong>Muttaqeen</strong> (God Conscious), <strong>Mujremeen</strong>
                        (Criminals/Sinners), <strong>Fasad</strong> (Mischief Makers) Etc.</li>
                    <li>The search provides explanation and interpretation of each word used in the Quran. In many cases
                        the explanation includes the contents of the previous verse or the subsequent verse, as they are
                        related to the same subject.</li>
                    <li>The Search provides capability of Inferring words, i.e., it will display verse 2:2 when you
                        search for
                        the word “Quran” even though verse 2:2 does not have the word Quran. Similarly, it will infer
                        and
                        display words or subjects that are directly not mentioned in the verse but are connected, and or
                        related to words or subjects discussed in the previous verses</li>
                    <li>The database has been built, to the extent possible, to recognize synonymous words, or names,
                        i.e.,
                        the Arabic word “Ureed” is often translated into desire, intend, want, or wish, and the search
                        will
                        recognize it. Similarly, Moses is also spelled as Musa or Moosa, and the search will recognize
                        it.</li>
                    <li>While the search engine provides capability of doing individual search on words or topics, we
                        have
                        included hundred of canned searches</li>
                    <li>Associated hadiths related to the Quran topic is also provided. However, this information is
                        provided
                        at the end of the Quran search. Please remember that the hadith list is not comprehensive, and
                        it
                        only lists key hadiths. Please consult an Ulema for any questions.</li>
                    <li>If you wish to contribute, or make any comments, please send your request to <a
                            href="mailto:Knowyourquran@gmail.com">Knowyourquran@gmail.com</a>.
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
                        Conduct Search by Entering the Word or Topic from the Quran here
                    </a>
                    <h5 class="separator-text">OR</h5>
                    <a href="{{ route('app.QuerySearchMenu') }}" class="start-search-button">
                        Select from Any of the Following Canned Queries
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
