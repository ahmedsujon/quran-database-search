<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use App\Models\Word;
use Livewire\Component;
use Livewire\WithPagination;

class QuerySearchResultComponent extends Component
{
    use WithPagination;
    public $searchTerm, $searchValue, $sortingValue = 20, $delete_id, $edit_id, $roles;

    public function mount()
    {
        $searchValue = request()->get('querymainvalue');
        $checkBoxValueOne = request()->get('checkboxvalue1');
        $checkBoxValueTwo = request()->get('checkboxvalue2');
    }

    public function render()
    {
        // Filter the Content table data based on the search value
        $final_results = Word::when($this->searchValue, function ($query) {
            $query->where('word_topic', 'like', '%' . $this->searchValue . '%');
        })->paginate($this->sortingValue);

        return view('livewire.app.queries-search.query-search-result-component', [
            'final_results' => $final_results
        ])->layout('livewire.app.layouts.base');
    }
}
