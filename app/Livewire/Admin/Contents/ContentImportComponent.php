<?php

namespace App\Livewire\Admin\Contents;

use App\Imports\ContentImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;


class ContentImportComponent extends Component
{

    public $excel;
    use WithFileUploads;

    public function uploadContentExcel()
    {
        $this->validate([
            'excel' => 'required',
        ]);

        Excel::import(new ContentImport, $this->excel);
        $this->excel = '';
        $this->dispatch('success', ['message' => 'Record Uploaded Successfuly!']);
    }

    public function render()
    {
        return view('livewire.admin.contents.content-import-component')->layout('livewire.admin.layouts.base');
    }
}
