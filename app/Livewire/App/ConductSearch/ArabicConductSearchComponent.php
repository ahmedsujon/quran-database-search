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

        if (!$wordTopic || empty($wordTopic->hadit_reference)) {
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

        $querySearchResults = Content::where('topic_arabic', 'like', '%' . $this->searchTerm . '%')
            ->get()
            ->map(function ($item) {
                return [
                    'id'                => $item->id,
                    'topic'             => $item->topic_arabic,
                    'search_value'      => $item->search_value ?? $item->topic_arabic,
                    'verse_description' => null,
                    'source_table'      => 'contents',
                ];
            });
        $querySearchResults2 = Quran::select('id as w_id', 'quran_arabic')
            ->where('quran_arabic', 'like', '%' . $this->searchTerm . '%')
            ->get()
            ->map(function ($item) {
                return [
                    'id'                => $item->w_id,
                    'topic'             => $item->quran_arabic,
                    'verse_description' => $item->quran_arabic,
                    'source_table'      => 'quran',
                ];
            });
        $querySearchFinalResults = $querySearchResults->merge($querySearchResults2)->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.arabic-conduct-search-component', [
            'querySearchResults' => $querySearchFinalResults,
            'main_menus'         => $main_menus,
        ])->layout('livewire.app.layouts.base');
    }
}
