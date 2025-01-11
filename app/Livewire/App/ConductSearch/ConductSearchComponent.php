<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\WordTopic;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

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
        $querySearchResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
            ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults])
            ->layout('livewire.app.layouts.base');
    }
}
