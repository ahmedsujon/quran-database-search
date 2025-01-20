<?php

namespace App\Livewire\App\PartialSearch;

use App\Models\Content;
use Livewire\Component;

class PartisalQSearchComponent extends Component
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
        return redirect()->route('app.QuerySearchResultPartial', [
            'searchValue' => $data->search_value
        ]);
    }

    public function render()
    {
        $menu_name = request()->menu_name;
        if ($menu_name) {
            session(['menu_name' => $menu_name]);
        }

        $searchValues = Content::where('main_menu_id', $this->mainMenu)->get();
        return view('livewire.app.partial-search.partisal-q-search-component', ['searchValues'=>$searchValues])->layout('livewire.app.layouts.base');
    }
}
