<?php

namespace App\Livewire\Admin\Word;

use App\Imports\WordImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class WordImportComponent extends Component
{
    public $excel;
    use WithFileUploads;

    public function uploadWordTopicExcel()
    {
        $this->validate([
            'excel' => 'required|file|mimes:csv,xlsx,txt|max:2048',
        ]);

        Excel::import(new WordImport, $this->excel);
        $this->excel = '';
        $this->dispatch('success', ['message' => 'Record Uploaded Successfuly!']);
    }

    public function render()
    {
        return view('livewire.admin.word.word-import-component')->layout('livewire.admin.layouts.base');
    }
}
