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

        // Load checkbox states from session or initialize them
        foreach ($searchValues as $key => $sVal) {
            $this->checkboxvaluey[$sVal->id] = session()->get("checkboxvaluey.{$sVal->id}", true);
            $this->checkboxvaluex[$sVal->id] = session()->get("checkboxvaluex.{$sVal->id}", true);
        }
    }

    public function selectQuranVerse($id)
    {
        $this->checkboxvaluex[$id] = !$this->checkboxvaluex[$id];
        session()->put("checkboxvaluex.{$id}", $this->checkboxvaluex[$id]);
    }

    public function selectHadith($id)
    {
        $this->checkboxvaluey[$id] = !$this->checkboxvaluey[$id];
        session()->put("checkboxvaluey.{$id}", $this->checkboxvaluey[$id]);
    }

    public function showData($id, $searchValue)
    {
        return redirect()->route('app.QuerySearchResult', [
            'searchValue' => $searchValue,
            'checkbox_one' => $this->checkboxvaluex[$id],
            'checkbox_two' => $this->checkboxvaluey[$id]
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
