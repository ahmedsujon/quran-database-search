<?php

namespace App\Livewire\Admin\Quran;

use App\Imports\QuranImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class QuranImportComponent extends Component
{

    public $excel;
    use WithFileUploads;

    public function uploaSuradExcel()
    {
        $this->validate([
            'excel' => 'required|file|mimes:csv,xlsx,txt|max:2048',
        ]);

        Excel::import(new QuranImport, $this->excel);
        $this->excel = '';
        $this->dispatch('success', ['message' => 'Record Uploaded Successfuly!']);
    }

    public function render()
    {
        return view('livewire.admin.quran.quran-import-component')->layout('livewire.admin.layouts.base');
    }
}
