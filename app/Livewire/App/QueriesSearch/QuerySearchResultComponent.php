<?php

namespace App\Livewire\App\QueriesSearch;

use App\Models\Word;
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

    public function mount()
    {
        $this->searchValue = request()->get('searchValue');
        $this->reporting = request()->get('reporting');
    }

    public function getHadithdata()
    {
        $hadith_results = Hadith::when($this->searchValue, function ($query) {
            $query->where('word_topic', 'like', '%' . $this->searchValue . '%');
        })->paginate($this->sortingValue);
    }

    // public function showAllHadiths($w_id)
    // {
    //     $word = DB::table('word_topics')->where('id', $w_id)->first()->word_topic;
    //     $hadiths = DB::table('hadiths')->select('hadith_english')->where('group_name', $word)->get();
    //     $this->hadiths = $hadiths;
    //     $this->dispatch('showHadithsModal');
    // }

    public function showAllHadiths($w_id)
    {
        $word = DB::table('word_topics')->where('id', $w_id)->first()->word_topic;
        $cacheKey = 'hadiths_for_word:' . md5($word);
        $hadiths = Cache::remember($cacheKey, 60, function () use ($word) {
            return DB::table('hadiths')
                ->select('hadith_english')
                ->where('group_name', $word)
                ->get();
        });
        $this->hadiths = $hadiths;
        $this->dispatch('showHadithsModal');
    }

    public function render()
    {
        // Generate a cache key based on the search parameters and sorting value
        $cacheKey = 'query_results:' . md5($this->searchValue . ':' . $this->sortingValue . ':' . $this->reporting);

        // Use Cache::remember to either get the cache or query the database and store it in Redis for 60 minutes
        $final_results = Cache::remember($cacheKey, 60, function () {
            // Start building the query
            $final_results = WordTopic::join('qurans', 'word_topics.surah_ayat', '=', 'qurans.surah_ayat')
                ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english');

            // Apply the search condition based on 'reporting' value
            if ($this->reporting == 'Yes') {
                $final_results = $final_results->where('word_topics.word_topic', 'like', '%' . $this->searchValue . '%');
            } else {
                $final_results = $final_results->where('word_topics.word_topic', $this->searchValue);
            }

            // Apply pagination
            $final_results = $final_results->paginate($this->sortingValue);

            return $final_results;
        });

        // Return the view with the cached or queried results
        return view('livewire.app.queries-search.query-search-result-component', [
            'final_results' => $final_results
        ])->layout('livewire.app.layouts.base');
    }

    // public function render()
    // {
    //     $final_results = WordTopic::join('qurans', 'word_topics.surah_ayat', 'qurans.surah_ayat')
    //         ->select('word_topics.id as w_id', 'word_topics.word_topic', 'word_topics.ayat_summary_des', 'word_topics.inferance_flag', 'qurans.quran_english');

    //     if ($this->reporting == 'Yes') {
    //         $final_results = $final_results->where('word_topics.word_topic',  'like', '%' .  $this->searchValue . '%');
    //     } else {
    //         $final_results = $final_results->where('word_topics.word_topic', $this->searchValue);
    //     }
    //     $final_results = $final_results->paginate($this->sortingValue);

    //     return view('livewire.app.queries-search.query-search-result-component', [
    //         'final_results' => $final_results
    //     ])->layout('livewire.app.layouts.base');
    // }
}
