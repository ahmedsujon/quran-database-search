<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use App\Models\Hadith;
use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class QuerySearchResultComponent extends Component
{
    use WithPagination;
    public $searchTerm, $searchValue, $checkbox_one, $checkbox_two, $sortingValue = 20, $delete_id, $edit_id, $roles;

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


    public function render()
    {
        $final_results = Word::join('qurans', 'words.surah_ayat', '=', 'qurans.surah_ayat')
            ->join('hadiths', 'words.word_topic', '=', 'hadiths.group_name') // Join the hadiths table based on word_topic
            ->select('words.*', 'qurans.*', 'hadiths.*') // Select fields from all joined tables
            ->where('words.word_topic', 'like', '%' . $this->searchValue . '%') // Filter based on the search term
            ->paginate($this->sortingValue);

        return view('livewire.app.queries-search.query-search-result-component', [
            'final_results' => $final_results
        ])->layout('livewire.app.layouts.base');
    }
}
