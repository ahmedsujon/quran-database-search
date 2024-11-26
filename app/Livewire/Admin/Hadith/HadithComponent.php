<?php

namespace App\Livewire\Admin\Hadith;

use Livewire\Component;

class HadithComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.hadith.hadith-component')->layout('livewire.admin.layouts.base');
    }
}
