<?php

namespace App\Livewire\Admin\Hadith;

use App\Models\Hadith;
use Livewire\Component;
use Livewire\WithPagination;

class HadithComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 50, $delete_id, $edit_id;

    public function render()
    {
        $hadith_datas = Hadith::where('group_name', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.hadith.hadith-component', ['hadith_datas'=>$hadith_datas])->layout('livewire.admin.layouts.base');
    }
}
