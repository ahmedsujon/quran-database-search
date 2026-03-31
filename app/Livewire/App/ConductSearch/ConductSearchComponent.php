<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Content;
use App\Models\Hadith;
use App\Models\MainMenu;
use App\Models\Quran;
use App\Models\WordTopic;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ConductSearchComponent extends Component
{
    use WithPagination;
    public $sortingValue = 15, $hadiths;

    public $quran_english;

    public $quran_arabic;

    public $searchTerm = '', $source_table;

    /**
     * When user manually types in search box - reset to default search (both tables).
     */
    public function clearSearchSource()
    {
        $this->source_table = null;
    }

    public function updateSearchTerm($searchValue, $source_table)
    {
        $this->searchTerm = $searchValue;
        $this->source_table = ! empty($searchValue) ? $source_table : null;
        $this->resetPage();
    }

    public function showQuranArabic($id, $source_table)
    {
        if ($source_table == 'word_topic') {
            $surahAyat = WordTopic::where('id', $id)->value('surah_ayat') ?? null;
        } else {
            $surahAyat = Content::where('id', $id)->value('surah_ayat') ?? null;
        }

        $quran = Quran::where('surah_ayat', $surahAyat)->value('quran_arabic') ?? null;

        $this->quran_arabic = $quran ?? 'No Arabic text available';
        $this->js('$("#quranArabicModal").modal("show");');
    }

    public function showAllHadiths($id, $source_table)
    {
        if ($source_table == 'word_topic') {
            $haditReference = DB::table('word_topics')->where('id', $id)->value('hadit_reference') ?? null;
        } else {
            $haditReference = DB::table('contents')->where('id', $id)->value('hadit_reference') ?? null;
        }

        $this->hadiths = Hadith::where('group_name', $haditReference)->get();
        $this->js('$("#hadithsModal").modal("show");');
    }

    public $queryNumber = 1;
    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $main_menus = MainMenu::all();

        $querySearchResults = collect();
        $querySearchResults2 = collect();

        // 1. If source is 'contents' (clicked Content item): show ONLY word_topics using search_value
        // 2. If source is 'word_topic' or null (default): search BOTH tables
        if ($this->source_table === 'contents') {
            $querySearchResults2 = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
                ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
                ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'                  => $item->w_id,
                        'topic'               => $item->word_topic,
                        'summary_description' => $item->ayat_summary_des,
                        'verse_description'   => $item->quran_english,
                        'inferance_flag'      => $item->inferance_flag,
                        'source_table'        => 'word_topic',
                    ];
                });
        } else {
            // Default: search both Content and WordTopic
            $querySearchResults = Content::where('topic', 'like', '%' . $this->searchTerm . '%')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'                  => $item->id,
                        'topic'               => $item->topic,
                        'search_value'        => $item->search_value ?? $item->topic,
                        'summary_description' => null,
                        'verse_description'   => null,
                        'inferance_flag'      => 0,
                        'source_table'        => 'contents',
                    ];
                });
            $querySearchResults2 = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
                ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
                ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'                  => $item->w_id,
                        'topic'               => $item->word_topic,
                        'summary_description' => $item->ayat_summary_des,
                        'verse_description'   => $item->quran_english,
                        'inferance_flag'      => $item->inferance_flag,
                        'source_table'        => 'word_topic',
                    ];
                });
        }

        $querySearchFinalResults = $querySearchResults
            ->toBase()
            ->merge($querySearchResults2->toBase())
            ->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.conduct-search-component', [
            'querySearchResults' => $querySearchFinalResults,
            'main_menus'         => $main_menus,
        ])->layout('livewire.app.layouts.base');
    }
}
