<?php

namespace App\Livewire\App\PartialSearch;

use App\Models\Hadith;
use Livewire\Component;
use App\Models\WordTopic;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class PartisalSearchComponent extends Component
{
    use WithPagination;
    public $searchTerm, $searchValue, $sortingValue = 20, $delete_id, $edit_id, $roles, $hadiths;

    public function mount()
    {
        $this->searchValue = request()->get('searchValue');
    }

    public function getHadithdata()
    {
        $hadith_results = Hadith::when($this->searchValue, function ($query) {
            $query->where('word_topic', 'like', '%' . $this->searchValue . '%');
        })->paginate($this->sortingValue);
    }

    public function showAllHadiths($w_id)
    {
        $word = DB::table('word_topics')->where('id', $w_id)->first()->word_topic;
        $hadiths = DB::table('hadiths')->select('hadith_english')->where('group_name', $word)->get();
        $this->hadiths = $hadiths;
        $this->dispatch('showHadithsModal');
    }

    public function render()
    {
        $final_results = WordTopic::join('qurans', 'word_topics.surah_ayat', 'qurans.surah_ayat')
            ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english')
            // ->where('word_topics.word_topic', $this->searchValue)
            ->where('word_topics.word_topic', 'like', '%' . $this->searchValue . '%')
            ->paginate($this->sortingValue);
        return view('livewire.app.partial-search.partisal-search-component', ['final_results' => $final_results])->layout('livewire.app.layouts.base');
    }
}
