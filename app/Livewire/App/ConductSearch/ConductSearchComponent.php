<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Quran;
use Livewire\Component;
use App\Models\MainMenu;
use App\Models\WordTopic;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ConductSearchComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 10, $hadiths;

    public function showAllHadiths($w_id)
    {
        $word = DB::table('word_topics')->where('id', $w_id)->first()->word_topic;
        $hadiths = DB::table('hadiths')->select('hadith_english')->where('group_name', $word)->get();
        $this->hadiths = $hadiths;
        $this->dispatch('showHadithsModal');
    }

    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $main_menus = MainMenu::all();

        // $querySearchResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
        //     ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
        //     ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
        //     ->paginate($this->sortingValue);

        // First, try searching in the word_topics table
        $querySearchResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
            ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);

        // If no results are found, perform the search in the qurans table
        if ($querySearchResults->isEmpty()) {
            $querySearchResults = Quran::select('qurans.id as q_id', 'qurans.quran_english', 'qurans.surah_no', 'qurans.ayat_no')
                ->where('qurans.quran_english', 'like', '%' . $this->searchTerm . '%')
                ->paginate($this->sortingValue);
        }


        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults, 'main_menus' => $main_menus])
            ->layout('livewire.app.layouts.base');
    }
}
