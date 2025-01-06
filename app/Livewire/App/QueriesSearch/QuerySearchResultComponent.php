<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use App\Models\Hadith;
use App\Models\Word;
use App\Models\WordTopic;
use Livewire\Component;
use Livewire\WithPagination;

class QuerySearchResultComponent extends Component
{
    use WithPagination;
    public $searchTerm, $searchValue, $checkbox_one, $checkbox_two, $sortingValue = 20, $delete_id, $edit_id, $roles, $hadiths;

    public function mount()
    {
        $this->searchValue = request()->get('querymainvalue');
        $this->checkbox_one = request()->get('checkbox_one');
        $this->checkbox_two = request()->get('checkbox_two');
    }

    public function getHadithdata()
    {
        $hadith_results = Hadith::when($this->searchValue, function ($query) {
            $query->where('word_topic', 'like', '%' . $this->searchValue . '%');
        })->paginate($this->sortingValue);
    }

    public function showAllHadiths($word)
    {
        $hadiths = Hadith::where('group_name', $word)->get();
        $this->hadiths = $hadiths;
        $this->dispatch('showHadithsModal');
    }


    public function render()
    {
        $selectedTopic = session('selected_topic');

        $final_results = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->join('hadiths', 'word_topics.word_topic', '=', 'hadiths.group_name') // Join the hadiths table based on word_topic
            ->select('word_topics.*', 'qurans.*', 'hadiths.*') // Select fields from all joined tables
            ->where('word_topics.word_topic', 'like', '%' . $this->searchValue . '%') // Filter based on the search term
            ->paginate($this->sortingValue);

        return view('livewire.app.queries-search.query-search-result-component', [
            'final_results' => $final_results, 'selectedTopic' => $selectedTopic
        ])->layout('livewire.app.layouts.base');
    }
}
