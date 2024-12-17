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
        $querySearchResults = Word::where('word_topic', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);
        return view('livewire.app.conduct-search.conduct-search-component', ['querySearchResults' => $querySearchResults])->layout('livewire.app.layouts.base');
    }
}
