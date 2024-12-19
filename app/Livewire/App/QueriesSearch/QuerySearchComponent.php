<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use Livewire\Component;

class QuerySearchComponent extends Component
{
    public $checkboxvaluex = null, $checkboxvaluey = null, $mainMenu;

    public function selectQuranVerse($id)
    {
        $this->checkboxvaluex = $id;
    }

    public function selectHadith($id)
    {
        $this->checkboxvaluey = $id;
    }

    public function mount()
    {
        $this->mainMenu = request('main_menu');
    }

    public function render()
    {
        $searchValues = Content::where('main_menu', $this->mainMenu)->get();
        return view('livewire.app.queries-search.query-search-component', ['searchValues' => $searchValues])->layout('livewire.app.layouts.base');
    }
}
