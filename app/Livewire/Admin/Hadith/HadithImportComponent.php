<?php

namespace App\Livewire\Admin\Hadith;

use App\Imports\HadithImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class HadithImportComponent extends Component
{

    public $excel;
    use WithFileUploads;

    public function uploaHadithExcel()
    {
        $this->validate([
            'excel' => 'required',
        ]);

        Excel::import(new HadithImport, $this->excel);
        $this->excel = '';
        $this->dispatch('success', ['message' => 'Record Uploaded Successfuly!']);
    }

    public function render()
    {
        return view('livewire.admin.hadith.hadith-import-component')->layout('livewire.admin.layouts.base');
    }
}
