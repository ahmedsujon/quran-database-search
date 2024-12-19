<?php

namespace App\Livewire\App\ConductSearch;

use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class ConductSearchComponent extends Component
{

    use WithPagination;
    public $searchTerm, $sortingValue = 20, $delete_id, $edit_id, $roles;

    public function render()
    {

        $querySearchResults = Word::join('qurans', 'words.surah_ayat', '=', 'qurans.surah_ayat')
            ->select('words.*', 'qurans.*') // Select columns from both tables (adjust based on what you need)
            ->where('words.word_topic', 'like', '%' . $this->searchTerm . '%') // Filter based on search term
            ->paginate($this->sortingValue); // Paginate the results


        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults])
            ->layout('livewire.app.layouts.base');
    }
}
