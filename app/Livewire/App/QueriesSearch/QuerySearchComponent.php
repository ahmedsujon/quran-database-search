<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Content;
use Livewire\Component;

class QuerySearchComponent extends Component
{
    public $checkboxvaluex = [], $checkboxvaluey = [], $mainMenu;

    public function mount($id)
    {
        $this->mainMenu = $id;
        $searchValues = Content::where('main_menu_id', $this->mainMenu)->get();
    }

    public function showData($id)
    {
        $data = Content::find($id);

        session()->put('content_topic', $data->topic);
        return redirect()->route('app.QuerySearchResult', [
            'searchValue' => $data->search_value,
            'reporting' => $data->reporting,
        ]);
    }

    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $searchValues = Content::where('main_menu_id', $this->mainMenu)->get();
        return view('livewire.app.queries-search.query-search-component', ['searchValues' => $searchValues])->layout('livewire.app.layouts.base');
    }
}
