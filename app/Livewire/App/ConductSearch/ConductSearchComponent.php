<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Hadith;
use App\Models\Word;
use App\Models\WordTopic;
use Livewire\Component;
use Livewire\WithPagination;

class ConductSearchComponent extends Component
{

    use WithPagination;
    public $searchTerm, $sortingValue = 10, $hadiths;

    public function showAllHadiths($word)
    {
        $hadiths = Hadith::where('group_name', $word)->get();
        $this->hadiths = $hadiths;
        $this->dispatch('showHadithsModal');
    }

    public function render()
    {
        $querySearchResults = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->join('hadiths', 'word_topics.word_topic', '=', 'hadiths.group_name')
            ->select('word_topics.*', 'qurans.*', 'hadiths.*')
            ->where('word_topics.word_topic', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults])
            ->layout('livewire.app.layouts.base');
    }
}
