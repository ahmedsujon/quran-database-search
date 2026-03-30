<?php

namespace App\Livewire\App\ArabicQueriesSearch;

use App\Models\Content;
use Livewire\Component;

class ArabicQuerySearchComponent extends Component
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

        $topicLabel = $data->topic_arabic ?? $data->topic;
        session()->put('content_topic', $topicLabel);

        return redirect()->route('app.ArabicQuerySearchResult', [
            'searchValue' => $data->search_value,
            'reporting' => $data->reporting,
        ]);
    }

    public function render()
    {
        $menuNameArabic = request()->menu_name_arabic;
        if ($menuNameArabic) {
            session(['menu_name_arabic' => $menuNameArabic]);
        }

        $searchValues = Content::where('main_menu_id', $this->mainMenu)->get();
        return view('livewire.app.arabic-queries-search.arabic-query-search-component', ['searchValues' => $searchValues])->layout('livewire.app.layouts.base');
    }
}
