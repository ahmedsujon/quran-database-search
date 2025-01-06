<?php

namespace App\Livewire\Admin\Word;

use App\Models\Word;
use App\Models\WordTopic;
use Livewire\Component;
use Livewire\WithPagination;

class WordComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 50, $delete_id, $edit_id;

    public function render()
    {
        $word_datas = WordTopic::where('word_topic', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.word.word-component', ['word_datas'=>$word_datas])->layout('livewire.admin.layouts.base');
    }
}
