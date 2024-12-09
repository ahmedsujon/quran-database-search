<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use Livewire\Component;

class QuerySearchComponent extends Component
{
    public function render()
    {
        $mainMenu = request('main_menu');
        $searchValues = Content::where('main_menu', $mainMenu)->get();
        return view('livewire.app.queries-search.query-search-component', ['searchValues' => $searchValues])->layout('livewire.app.layouts.base');
    }
}
