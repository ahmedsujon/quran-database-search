<?php

namespace App\Livewire\Admin;

use App\Models\Content;
use App\Models\Hadith;
use App\Models\Quran;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $qutanData = Quran::count();
        $hadithData = Hadith::count();
        $contentData = Content::count();
        $wordTopicData = Quran::count();
        return view('livewire.admin.dashboard-component', ['qutanData' => $qutanData, 'hadithData' => $hadithData, 'contentData' => $contentData, 'wordTopicData'=>$wordTopicData])->layout('livewire.admin.layouts.base');
    }
}
