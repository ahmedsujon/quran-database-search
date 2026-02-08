<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Quran;
use Livewire\Component;
use App\Models\MainMenu;
use App\Models\WordTopic;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ArabicConductSearchComponent extends Component
{
    use WithPagination;
    public $sortingValue = 15, $hadiths;

    public $quran_english;

    public $quran_arabic;

    public $searchTerm = '';

    public function updateSearchTerm($wordTopic)
    {
        $this->searchTerm = $wordTopic;
        $this->resetPage();
        $this->render();
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

        if (! $wordTopic || empty($wordTopic->hadit_reference)) {
            return;
        }
        $this->hadiths = DB::table('hadiths')
            ->select('hadith_english')
            ->where('group_name', $wordTopic->hadit_reference)
            ->get();
        $this->dispatch('showHadithsModal');
    }

    public $queryNumber = 1;
    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $main_menus = MainMenu::all();

        // Split search term into words for better search matching
        $searchWords = explode(' ', $this->searchTerm);

        // Query for WordTopic and join with Qurans table, sorted alphabetically by word_topic
        $queryFirstSearchResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->select(
                'word_topics.id as w_id',
                'word_topics.word_topic',
                'word_topics.ayat_summary_des',
                'word_topics.inferance_flag',
                'qurans.quran_english',
                'qurans.quran_arabic'
            );

        // Apply search filtering for each word
        foreach ($searchWords as $word) {
            $queryFirstSearchResults->where('word_topics.word_topic', 'like', '%' . $word . '%');
        }

        $queryFirstSearchResults = $queryFirstSearchResults->orderBy('word_topics.word_topic', 'asc')
            ->paginate($this->sortingValue);

        // If no results in WordTopic, fallback to Quran search
        if ($queryFirstSearchResults->isEmpty()) {
            $querySecondSearchResults = Quran::select(
                'id as w_id',
                'quran_english',
                'quran_arabic',
                'surah_no',
                'ayat_no'
            );

            // Apply search filtering for each word in `eng_subject_category`
            foreach ($searchWords as $word) {
                $querySecondSearchResults->where('quran_english', 'like', '%' . $word . '%');
            }

            $querySecondSearchResults = $querySecondSearchResults->orderBy('quran_english', 'asc')
                ->paginate($this->sortingValue);

            $querySearchResults = $querySecondSearchResults;

            $this->queryNumber = 2;
        } else {
            $querySearchResults = $queryFirstSearchResults;
            $this->queryNumber  = 1;
        }

        return view('livewire.app.conduct-search.arabic-conduct-search-component', [
            'querySearchResults' => $querySearchResults,
            'main_menus'         => $main_menus,
        ])->layout('livewire.app.layouts.base');
    }
}
