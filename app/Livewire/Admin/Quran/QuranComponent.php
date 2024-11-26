<?php

namespace App\Livewire\Admin\Quran;

use App\Models\Quran;
use Livewire\Component;
use Livewire\WithPagination;

class QuranComponent extends Component
{
    use WithPagination;
    public $searchTerm, $sortingValue = 50, $delete_id, $edit_id;

    public function render()
    {
        $quran_datas = Quran::where('quran_english', 'like', '%' . $this->searchTerm . '%')->orderBy('id', 'DESC')->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.quran.quran-component', ['quran_datas' => $quran_datas])->layout('livewire.admin.layouts.base');
    }
}
