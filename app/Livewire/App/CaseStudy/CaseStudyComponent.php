<?php

namespace App\Livewire\App\CaseStudy;

use Livewire\Component;

class CaseStudyComponent extends Component
{
    public function render()
    {
        return view('livewire.app.case-study.case-study-component')->layout('livewire.app.layouts.base');
    }
}
