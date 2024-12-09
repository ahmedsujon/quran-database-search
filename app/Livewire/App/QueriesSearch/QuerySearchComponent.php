<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use Livewire\Component;

class QuerySearchComponent extends Component
{
    public function render()
    {
        $search_values = Content::get();
        return view('livewire.app.queries-search.query-search-component', ['search_values'=>$search_values])->layout('livewire.app.layouts.base');
    }
}
