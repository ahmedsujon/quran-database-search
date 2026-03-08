<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Word;
use App\Models\Quran;
use App\Models\Hadith;
use App\Models\Content;
use Livewire\Component;
use App\Models\WordTopic;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class QuerySearchResultComponent extends Component
{
    use WithPagination;
    public $searchTerm, $searchValue, $reporting, $sortingValue = 20, $delete_id, $edit_id, $roles, $hadiths;
    public $quran_arabic;

    public function mount()
    {
        $this->searchValue = request()->get('searchValue');
        $this->reporting = request()->get('reporting');
    }

    public function showQuranArabic($w_id)
    {
        $item = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->select('word_topics.id as w_id', 'qurans.quran_arabic')
            ->where('word_topics.id', $w_id)
            ->first();
        if (!$item) {
            $item = Quran::select('id as q_id', 'quran_arabic')
                ->where('id', $w_id)
                ->first();
        }
        $this->quran_arabic = $item?->quran_arabic ?? 'No Arabic text available';
        $this->dispatch('showQuranArabicModal');
    }

    public function getHadithdata()
    {
        $hadith_results = Hadith::when($this->searchValue, function ($query) {
            $query->where('word_topic', 'like', '%' . $this->searchValue . '%');
        })->paginate($this->sortingValue);
    }


    public function showAllHadiths($w_id)
    {
        $wordTopic = DB::table('word_topics')->where('id', $w_id)->first();

        if (!$wordTopic || empty($wordTopic->hadit_reference)) {
            return;
        }
        $this->hadiths = DB::table('hadiths')
            ->select('hadith_english')
            ->where('group_name', $wordTopic->hadit_reference)
            ->get();
        $this->dispatch('showHadithsModal');
    }

    public function render()
    {
        $final_results = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
            ->select(
                'word_topics.id as w_id',
                'word_topics.word_topic',
                'word_topics.ayat_summary_des',
                'word_topics.inferance_flag',
                'qurans.quran_english',
                'qurans.quran_arabic'
            );

        if ($this->reporting == 'Yes') {
            $final_results = $final_results->where('word_topics.word_topic', 'like', '%' . $this->searchValue . '%');
        } else {
            $final_results = $final_results->where('word_topics.word_topic', $this->searchValue);
        }
        $final_results = $final_results->paginate($this->sortingValue);

        return view('livewire.app.queries-search.query-search-result-component', [
            'final_results' => $final_results
        ])->layout('livewire.app.layouts.base');
    }
}
