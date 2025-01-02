<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Hadith;
use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class ConductSearchComponent extends Component
{

    use WithPagination;
    public $searchTerm, $sortingValue = 20, $delete_id, $edit_id, $roles, $hadiths;

    public function showAllHadiths($word)
    {
        $hadiths = Hadith::where('group_name', $word)->get();
        $this->hadiths = $hadiths;

        $this->dispatch('showHadithsModal');
    }

    public function render()
    {

        // $querySearchResults = Word::join('qurans', 'words.surah_ayat', '=', 'qurans.surah_ayat')
        //     ->select('words.*', 'qurans.*')
        //     ->where('words.word_topic', 'like', '%' . $this->searchTerm . '%')
        //     ->paginate($this->sortingValue);

        $querySearchResults = Word::join('qurans', 'words.surah_ayat', '=', 'qurans.surah_ayat')
            ->join('hadiths', 'words.word_topic', '=', 'hadiths.group_name') // Join the hadiths table based on word_topic
            ->select('words.*', 'qurans.*', 'hadiths.*') // Select fields from all joined tables
            ->where('words.word_topic', 'like', '%' . $this->searchTerm . '%') // Filter based on the search term
            ->paginate($this->sortingValue);

        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults])
            ->layout('livewire.app.layouts.base');
    }
}
