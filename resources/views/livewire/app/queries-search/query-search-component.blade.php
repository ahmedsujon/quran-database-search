<div>
    <div class="container mt-4">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Name of Query</th>
                    <th scope="col">Quran Verses</th>
                    <th scope="col">Associated Hadith</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($searchValues as $item)
                    <tr>
                        <th scope="row">
                            <a
                                href="{{ route('app.QuerySearchResult') }}?querymainvalue={{ $item->search_value }}&checkboxvalue1={{ $checkboxvaluex }}&checkboxvalue2={{ $checkboxvaluey }}">{{ $item->topic }}</a>
                        </th>
                        <td>
                            <input type="checkbox" wire:click="selectQuranVerse({{ $item->id }})"
                                {{ $checkboxvaluex == $item->id ? 'checked' : '' }}>
                                <label>Yes/No</label>
                        </td>
                        <td>
                            <input type="checkbox" wire:click="selectHadith({{ $item->id }})"
                                {{ $checkboxvaluey == $item->id ? 'checked' : '' }}>
                                <label>Yes/No</label>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
