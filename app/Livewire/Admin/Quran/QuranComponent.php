<?php

namespace App\Livewire\Admin\Quran;

use Livewire\Component;

class QuranComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.quran.quran-component')->layout('livewire.admin.layouts.base');
    }
}
