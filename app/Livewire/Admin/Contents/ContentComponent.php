<?php

namespace App\Livewire\Admin\Contents;

use Livewire\Component;

class ContentComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.contents.content-component')->layout('livewire.admin.layouts.base');
    }
}
