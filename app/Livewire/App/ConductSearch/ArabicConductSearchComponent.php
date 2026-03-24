<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Content;
use App\Models\MainMenu;
use App\Models\Quran;
use App\Models\WordTopic;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ArabicConductSearchComponent extends Component
{
    use WithPagination;
    public $sortingValue = 15, $hadiths;

    public $quran_english;

    public $quran_arabic;

    public $searchTerm = '', $wordTopic;

    public function updateSearchTerm($searchValue, $wordTopic)
    {
        $this->searchTerm = $searchValue;
        $this->wordTopic = $wordTopic;

        $this->resetPage();
    }

    public function updatedWordTopic()
    {
        $sValue = Content::where('topic_arabic', 'like', '%' . $this->wordTopic . '%')->value('search_value');

        $this->updateSearchTerm($sValue, $this->wordTopic);
    }

    public function showQuranArabic($w_id)
    {
        if ($this->queryNumber == 1) {
            $item = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
                ->select('word_topics.id as w_id', 'qurans.quran_arabic')
                ->where('word_topics.id', $w_id)
                ->first();
        } else {
            $item = Quran::select('id as q_id', 'quran_arabic')
                ->where('id', $w_id)
                ->first();
        }
        $this->quran_arabic = $item->quran_arabic ?? 'No Arabic text available';
        $this->dispatch('showQuranArabicModal');
    }

    public function showAllHadiths($w_id)
    {
        $wordTopic = DB::table('word_topics')->where('id', $w_id)->first();
        if (!$wordTopic || empty($wordTopic->hadit_reference)) {
            return;
        }
        $this->hadiths = DB::table('hadiths')
            ->select('hadith_arabic')
            ->where('group_name', $wordTopic->hadit_reference)
            ->get();

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

        $querySearchResults = Content::where('topic_arabic', 'like', '%' . $this->wordTopic . '%')
            ->get()
            ->map(function ($item) {
                return [
                    'id'                => $item->id,
                    'topic'             => $item->topic_arabic,
                    'search_value'      => $item->search_value ?? null,
                    'verse_description' => null,
                    'source_table'      => 'contents',
                ];
            });

        if ($this->searchTerm) {

            $querySearchFinalResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
                ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.arabic_normalize_word_without_harkat', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_arabic')
                ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
                ->get()
                ->map(function ($item) {
                    return [
                        'id'                  => $item->w_id,
                        'topic'               => $item->arabic_normalize_word_without_harkat,
                        'search_value'        => $this->wordTopic,
                        'verse_description'   => $item->quran_arabic,
                        'inferance_flag'      => $item->inferance_flag,
                        'source_table'        => 'word_topic',
                    ];
                });
        } else {
            $querySearchFinalResults = $querySearchResults;
        }

        $querySearchFinalResults = $querySearchFinalResults->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.arabic-conduct-search-component', [
            'querySearchResults' => $querySearchFinalResults,
            'main_menus'         => $main_menus,
        ])->layout('livewire.app.layouts.base');
    }
}
