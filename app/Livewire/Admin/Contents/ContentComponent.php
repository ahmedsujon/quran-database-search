<?php

namespace App\Livewire\Admin\Contents;

use App\Models\Content;
use App\Models\MainMenu;
use Livewire\Component;
use Livewire\WithPagination;

class ContentComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 50, $delete_id, $edit_id;

    public function render()
    {
        $content_datas = MainMenu::where('menu_name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.contents.content-component', ['content_datas' => $content_datas])->layout('livewire.admin.layouts.base');
    }
}
