<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class QuerySearchResultComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 20, $delete_id, $edit_id, $roles;

    public function mount()
    {
        $searchValue = request()->get('querymainvalue');
        $checkBoxValueOne = request()->get('checkboxvalue1');
        $checkBoxValueTwo = request()->get('checkboxvalue2');
    }

    public function render()
    {
        $final_results = Content::where('words.word_topic', 'like', '%' . $this->searchTerm . '%')->paginate($this->sortingValue);
        return view('livewire.app.queries-search.query-search-result-component', ['final_results'=>$final_results])->layout('livewire.app.layouts.base');
    }
}
